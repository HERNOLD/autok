<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maker;
use App\Models\Models;
use App\Models\Color;
use App\Models\Fuels;
use App\Models\Body;
use App\Models\GearShift;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cars/list', ['entities'=>Car::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create', ['makers'=>Maker::all(), 'models'=>Models::all(), 'colors'=>Color::all(), 'fuels'=>Fuels::all(), 'bodies'=>Body::all(), 'shifts'=>GearShift::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $car = new Car;
        $car->maker_id=$request->maker;
        $car->model_id=$request->model;
        $car->fuel_id=$request->fuel;
        $car->gear_id=$request->shift;
        $car->body_id=$request->body;
        $car->color_id=$request->color;
        $car->save();

        return view('cars/list', ['entities'=>Car::all(), 'makers'=>Maker::all(), 'models'=>Models::all(), 'colors'=>Color::all(), 'fuels'=>Fuels::all(), 'bodies'=>Body::all(), 'shifts'=>GearShift::all()]);
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
        $car = Car::find($id);
        return view('cars.edit', compact('car'), ['entities'=>Car::all(), 'makers'=>Maker::all(), 'models'=>Models::all(), 'colors'=>Color::all(), 'fuels'=>Fuels::all(), 'bodies'=>Body::all(), 'shifts'=>GearShift::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = Car::find($id);
        $car->maker_id=$request->maker;
        $car->model_id=$request->model;
        $car->fuel_id=$request->fuel;
        $car->gear_id=$request->shift;
        $car->body_id=$request->body;
        $car->color_id=$request->color;
        $car->save();

        return view('cars/list', ['entities'=>Car::all()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::find($id);
        $car->delete();
        
        return redirect()->route("cars.show");
    }
}
