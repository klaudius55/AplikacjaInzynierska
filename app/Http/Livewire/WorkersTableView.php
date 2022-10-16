<?php

namespace App\Http\Livewire;

use App\Models\Worker;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;


class WorkersTableView extends TableView
{

    public $searchBy = ['name','surname'];
    protected $model = Worker::class;
    protected $paginate = 10;

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
            Header::title('Surname')->sortBy('surname'),
            Header::title('Created')->sortBy('created_at'),
            Header::title('Modified')->sortBy('update_at')
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

}
