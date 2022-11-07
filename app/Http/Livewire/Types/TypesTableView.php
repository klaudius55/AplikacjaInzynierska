<?php

namespace App\Http\Livewire\Types;

use App\Models\Type;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;

class TypesTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Type::class;

    public $searchBy = ['name'];
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
    public function row(Type $type): array
    {
        return [
            $type->id,
            $type->name,
            $type->created_at,
            $type->update_at
        ];
    }
}
