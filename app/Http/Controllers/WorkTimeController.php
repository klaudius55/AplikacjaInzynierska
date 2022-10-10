<?php

namespace App\Http\Controllers;

use App\Models\WorkTime;
use Illuminate\Http\Request;

class WorkTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('workTimes.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkTime  $workTime
     * @return \Illuminate\Http\Response
     */
    public function show(WorkTime $workTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkTime  $workTime
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkTime $workTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkTime  $workTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkTime $workTime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkTime  $workTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkTime $workTime)
    {
        //
    }
}
