<?php

namespace App\Http\Controllers;

use App\Models\TaskWorker;
use Illuminate\Http\Request;

class TaskWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('task_workers.index');
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
     * @param  \App\Models\TaskWorker  $workTime
     * @return \Illuminate\Http\Response
     */
    public function show(TaskWorker $workTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskWorker  $workTime
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskWorker $workTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskWorker  $workTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskWorker $workTime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskWorker  $workTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskWorker $workTime)
    {
        //
    }
}
