<?php

namespace App\Http\Controllers;

use App\Models\Schema;
use App\Http\Requests\StoreSchemaRequest;
use App\Http\Requests\UpdateSchemaRequest;

class SchemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.skema.index', [
            'title' => 'Skema Sertifikasi',
            'schemes' => Schema::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.skema.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchemaRequest $request)
    {
        $data = $request->except(['_token', 'judul_unit']);

        Schema::create([
            'judul_unit' => $request->get('judul_unit'),
            'elemen_kompetensi' => json_encode($data)
        ]);

        return redirect(route('schema.index'))->with('success', 'Data added!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Schema $schema)
    {
        return view('pages.skema.detail', [
            'schema' => $schema
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schema $schema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchemaRequest $request, Schema $schema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schema $schema)
    {
        $schema->delete();

        return redirect()->back()->with('success', 'Data deleted!');
    }
}
