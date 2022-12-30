<?php

namespace App\Http\Livewire\Tasks;

use App\Actions\Tasks\SoftDeleteTask;
use App\Models\Task;
use LaravelViews\Actions\RedirectAction;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;

class TasksTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Task::class;

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
            Header::title('Date')->sortBy('date'),
            Header::title('Project')->sortBy('projects_id'),
            Header::title('Worker')->sortBy('workers_id'),
            Header::title('QuantityHours')->sortBy('quantityHours'),
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
    public function row(Task $task): array
    {
        return [
            $task->id,
            $task->name,
            $task->date,
            $task->projects->name?? 'brak przynależności',
           // $task->workers->name?? 'no name',
            $task->quantityHours,
            $task->created_at,
            $task->updated_at,
            $task->deleted_at,

        ];
    }

    protected function actionsByRow()
    {
        return [
            new RedirectAction('tasks.registerUsedMaterial','Add material','plus'),
            new RedirectAction('tasks.edit', 'Edytuj', 'edit'),
            new SoftDeleteTask()
        ];
    }
}
