<?php

namespace App\Http\Livewire\Materials;

use App\Models\Material;
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
        return [];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [];
    }
}