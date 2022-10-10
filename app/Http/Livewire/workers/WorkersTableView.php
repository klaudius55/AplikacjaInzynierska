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
            'ID',
            'name',
            'surname',
            'created_at',
            'update_at'
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row(Worker $worker): array
    {
        return [
            $worker->id,
            $worker->name,
            $worker->surname,
            $worker->created_at,
            $worker->update_at

        ];
    }
    public $searchBy = ['name', 'surname'];
}
