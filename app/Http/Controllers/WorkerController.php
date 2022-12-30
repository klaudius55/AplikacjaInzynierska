<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('workers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workers.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Worker $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit(Worker $worker)
    {
        return view(
            'workers.form',
            [
                'worker'=>$worker
            ]

        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Worker $worker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker)
    {

    }

    public function allOpen()
    {
        return Worker::all()->map(function ($value){
            return ['name'=> $value->name, 'id' => $value->id];
        })->toArray();
    }
    /*public function async(string|null $search, array|null $selected): Collection
    {
        return Worker::query()
            ->select('worker_id', 'name')
            ->orderBy('name')
            ->when(
                $search,
                fn (Builder $query) => $query->where('name', 'like', "%{$search}%")
            )
            ->when(
                $selected,
                fn (Builder $query) => $query->whereIn(
                    'worker_id',
                    array_map(
                        fn (array $item) => $item['worker_id'],
                        array_filter(
                            $selected,
                            fn ($item) => (is_array($item) && isset($item['worker_id']))
                        )
                    )
                ),
                fn (Builder $query) => $query->limit(Worker::count())
            )
            ->get();
    }*/
}
