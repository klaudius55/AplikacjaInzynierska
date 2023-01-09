<?php

namespace App\Http\Livewire\Material_Task;

use App\Models\Material_Task;
use LaravelViews\Views\TableView;

class Material_TaskTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Material_Task::class;

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
