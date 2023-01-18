<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use LaravelViews\Data\Contracts\Searchable;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('materials.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materials.form');
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
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        return view(
            'materials.form',
            [
                'material'=>$material
            ]

        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
    }


    public function async(Request $request)
    {

       return Material::query()
            ->select(['*'])
            ->orderBy('name')
            ->when(
                $request->search,
                fn (Builder $query) => $query->where('name', 'like', "%{$request->search}%"),
                fn (Builder $query) => $query->where('type_id', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->selected),
                fn (Builder $query) => $query->limit(Material::count())
            )
            ->get()
            ->map(function ($item) {
                return collect([
                    'id' => $item->id,
                    'name' => $item->name .': '.'grubość '.'['.$item->thickness.''.'mm]'.' '.'typ'.':'.' '.'"'. $item->types->name.'"'.' ['. $item->units->name.']'
                ]);
            });
    }

   /* public function async(Request $request)
    {
        return Material::query()
            ->select((['*']))
            ->orderBy('name',)
            ->when(
                $request->search,
                fn(Builder $query) => $query
                    ->where('*', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn(Builder $query) => $query->whereIn(
                    'id',
                    array_map(
                        fn(array $item) => $item['id'],
                        array_filter(
                            $request->input('selected', ['thickness']),
                            fn($item) => (is_array($item) && isset($item['id']))
                        )
                    )
                ),
                fn(Builder $query) => $query->limit(Material::count())
            )
            ->get();
    }*/

}
