<?php

namespace App\Http\Controllers;

use App\Models\notes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('notes.index');
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
        // Validación de datos
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Crear la nota asociada al usuario autenticado
        $note = new notes();
        $note->title = $validatedData['title'];
        $note->description = $validatedData['description'];
        $note->user_id = auth()->id(); // Asignar el ID del usuario autenticado
        $note->save();

        return response()->json(['message' => 'Nota creada con éxito'], 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(notes $notes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(notes $notes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, notes $notes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(notes $notes)
    {
        //
    }
}
