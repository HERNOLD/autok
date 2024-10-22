<?php

namespace App\Http\Controllers;

use App\Models\Fuels;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fuels/list', ['entities'=>Fuels::all()]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fuel = Fuels::find($id);
        return view('fuels.edit', compact('fuel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fuel = Fuels::find($id);
        $fuel->name = $request->name;
        $fuel->save();

        return view('fuels/list', ['entities'=>Fuels::all()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fuel = Fuels::find($id);
        $fuel->delete();

        return view('fuels/list', ['entities'=>Fuels::all()]);
    }
}
