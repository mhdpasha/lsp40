<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = request()->is('asesor')
                ? 'asesor'
                : 'asesi';

        return view("pages.$role.index", [
            'users' => User::where('role', $role)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $path = $file->getRealPath();
            $data = array_map('str_getcsv', file($path));
            $header = array_shift($data);

            foreach ($data as $row) {
               
                $nama = $row[0];
                $umur = $row[1];
                $jurusan = $row[2];
                $tanggallahir = Carbon::createFromFormat('d-m-Y', $row[3])->format('Y-m-d');

                $username = $this->generateUniqueUsername($nama);
                $password = Str::random(8); // need trait soon

                User::create([
                    'nama' => $nama,
                    'umur' => $umur,
                    'jurusan' => $jurusan,
                    'tanggallahir' => $tanggallahir,
                    'username' => $username,
                    'password' => Hash::make($password),
                    'role' => 'asesi'
                ]);

            }

            return redirect()->back()->with('success', 'CSV data imported');
        } 

        return redirect()->back();
    }

    private function generateUniqueUsername($nama)
    {
        $baseUsername = Str::slug($nama);

        $username = $baseUsername;
        $counter = 1;
        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }

        return $username;
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
