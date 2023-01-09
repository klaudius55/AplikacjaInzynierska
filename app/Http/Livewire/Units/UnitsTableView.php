<?php

namespace App\Http\Livewire\Units;

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
            Header::title(__('translation.attributes.name'))->sortBy('name'),
            Header::title(__('translation.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('translation.attributes.updated_at'))->sortBy('updated_at'),
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
