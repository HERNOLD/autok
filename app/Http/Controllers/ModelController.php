<?php

namespace App\Http\Controllers;

use App\Models\Models;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sort_by = request()->query("sort_by", "name");
        $sort_dir = request()->query("sort_dir", "asc");
        $entities = Models::orderBy($sort_by, $sort_dir)->paginate(10);
        return view('models/list', compact("entities"));
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
        $model = Models::find($id);
        return view('models.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = Models::find($id);
        $model->name = $request->name;
        $model->save();

        $sort_by = request()->query("sort_by", "name");
        $sort_dir = request()->query("sort_dir", "asc");
        $entities = Models::orderBy($sort_by, $sort_dir)->paginate(10);
        return view('models/list', compact("entities"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Models::find($id);
        $model->delete();
        
        return redirect()->route("models");
    }
}
