<?php

namespace App\Http\Livewire;

use App\Models\Type;
use LaravelViews\Views\TableView;

class TypesTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Type::class;

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