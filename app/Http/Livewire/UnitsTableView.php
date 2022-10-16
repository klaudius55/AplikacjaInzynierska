<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;

class UnitsTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Unit::class;

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
            Header::title('Created')->sortBy('created_at'),
            Header::title('Modified')->sortBy('update_at')
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row(Unit $unit): array
    {
        return [
            $unit->id,
            $unit->name,
            $unit->created_at,
            $unit->update_at
        ];
    }
}
