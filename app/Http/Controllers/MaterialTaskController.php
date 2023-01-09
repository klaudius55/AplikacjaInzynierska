<?php

namespace App\Http\Controllers;

use App\Models\Material_Task;
use Illuminate\Http\Request;

class MaterialTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materialtasks.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaterialTask  $usedMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(MaterialTask $usedMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaterialTask  $usedMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(MaterialTask $usedMaterial)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaterialTask  $usedMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaterialTask $usedMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaterialTask  $usedMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaterialTask $usedMaterial)
    {
        //
    }
}
