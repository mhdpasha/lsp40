<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Asession;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAsessionRequest;
use App\Http\Requests\UpdateAsessionRequest;

class AsessionController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.asesi.index', [
            'title' => 'Asesi',
            'users' => User::where('role', 'asesi')->get(),
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
    public function store(StoreAsessionRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Asession $asession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asession $asession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAsessionRequest $request, Asession $asession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asession $asession)
    {

    }
}
