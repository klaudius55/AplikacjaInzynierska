<?php

namespace App\Http\Livewire\Materials;

use App\Models\Material;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;

class MaterialsTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Material::class;


    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('ID')->sortBy('id'),
            Header::title('Name')->sortBy('name'),
            Header::title('Thickness')->sortBy('thickness'),
            'Type',
            'Unit',
            Header::title('Created')->sortBy('created_at'),
            Header::title('Modified')->sortBy('updated_at'),
            Header::title('Deleted')->sortBy('deleted_at'),
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row(Material $material): array
    {

        return [
        $material->id,
        $material->name,
        $material->thickness,
            $material->types->name,
            $material->units->name,
        $material->created_at,
        $material->updated_at,
        $material->deleted_at,

    ];
    }
}
