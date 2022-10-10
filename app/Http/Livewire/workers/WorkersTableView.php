<?php

namespace App\Http\Livewire\workers;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;

class WorkersTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     * @return Builder Eloquent query
     */

    protected $paginate = 10;
    public function repository(): Builder
    {
        return Worker::query();
    }
    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('name')->sortBy('name'),
            Header::title('surname')->sortBy('surname'),
           /* 'name',
            'surname',
            'created_at',
            'update_at'
           */
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->name,
            $model->surname,
            $model->created_at,
            $model->update_at

        ];
    }
    public $searchBy = ['name', 'surname'];
}
