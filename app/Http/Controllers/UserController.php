<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->getRealPath();
            $data = array_map('str_getcsv', file($path));
            $header = array_shift($data);

            foreach ($data as $row) {
                $nama = $row[0];
                $umur = $row[1];
                $jurusan = $row[2];
                $tanggallahir = Carbon::createFromFormat('Y-m-d', $row[3])->format('d-m-Y');
                $username = $this->generateUniqueUsername($nama);
                $password = Str::random(8);
                $profil = [
                    'Umur' => $umur,
                    'Jurusan' => $jurusan,
                    'Tanggal Lahir' => $tanggallahir,
                ];

                User::create([
                    'name' => $nama,
                    'password' => Hash::make($password),
                    'profil' => json_encode($profil),
                    'role' => 'Asesi',
                    'username' => $username,
                ]);
            }
            return redirect()->back()->with('success', 'CSV data imported');
        }

        $validated = $request->validate([
            'username' => 'required|unique:users',
            'nama' => 'required',
            'password' => 'required'
        ]);

        $profile = $request->validate([
            'no_registrasi' => 'required',
            'sekolah' => 'required',
            'kompetensi' => 'required',
            'norek' => 'required',
            'no_hp' => 'required',
            'NPWP' => 'required',
            'alamat' => 'required',
            'active' => 'required',
        ]);

        $profile['active'] = Carbon::createFromFormat('Y-m-d', $profile['active'])->format('d-m-Y');

        User::create([
            'nama' => $validated['nama'],
            'password' => Hash::make($validated['password']),
            'profil' => json_encode($profile),
            'role' => 'Asesor',
            'username' => $validated['username'],
        ]);

        return redirect(route('asessor.index'))->with('success', 'Data added!');
    }

    private function generateUniqueUsername($nama)
    {
        // Generate a base username from the user's name
        $baseUsername = Str::slug($nama);

        // Check if the username already exists
        $username = $baseUsername;
        $counter = 1;
        while (User::where('username', $username)->exists()) {
            // Append a number to the base username to make it unique
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
        if($user->role == 'Asesor') {
            return view('pages.asesor.edit', [
                'user' => $user
            ]);
        }

        return view('pages.asesi.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);

        if($request->get('password')){
            $validated['password'] = Hash::make($request->get('password'));
        }

        if ($user->role == 'Asesor') {
            $profile = $request->validate([
            'no_registrasi' => 'required',
            'sekolah' => 'required',
            'kompetensi' => 'required',
            'norek' => 'required',
            'no_hp' => 'required',
            'NPWP' => 'required',
            'alamat' => 'required',
            'active' => 'required',
        ]);
        }
        $profile['active'] = Carbon::createFromFormat('Y-m-d', $profile['active'])->format('d-m-Y');
        $validated['profil'] = json_encode($profile);

        $user->update($validated);

        return redirect(route('asessor.index'))->with('success', 'Data edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', 'Data deleted!');
    }

}
