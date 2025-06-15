<?php

namespace App\Http\Controllers;

use App\Models\Pracownik;
use Illuminate\Http\Request;

class PracownikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $firmaId = $request->query('firma_id');

        if ($firmaId) {
            return Pracownik::where('firma_id', $firmaId)->get();
        }

        return Pracownik::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'imie' => 'required|string|max:255',
            'nazwisko' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:pracowniks',
            'numer_telefonu' => 'nullable|string|max:20',
            'firma_id' => 'required|exists:firmas,id',
        ]);

        $pracownik = Pracownik::create($validated);

        return response()->json($pracownik, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pracownik  $pracownik
     * @return \Illuminate\Http\Response
     */
    public function show(Pracownik $pracownik)
    {
        return response()->json($pracownik->load('firma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pracownik  $pracownik
     * @return \Illuminate\Http\Response
     */
    public function edit(Pracownik $pracownik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pracownik  $pracownik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pracownik $pracownik)
    {
        $pracownik->update($request->validate([
            'firma_id' => 'sometimes|exists:firmas,id',
            'imie' => 'sometimes|string',
            'nazwisko' => 'sometimes|string',
            'email' => 'sometimes|string',
            'numer_telefonu' => 'nullable|string',
        ]));

        return response()->json($pracownik);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pracownik  $pracownik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pracownik $pracownik)
    {
        $pracownik->delete();
        return response()->json(['message' => 'Pracownik został usunięty']);
    }
}