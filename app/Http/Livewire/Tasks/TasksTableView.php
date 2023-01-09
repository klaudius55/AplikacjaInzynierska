<?php

namespace App\Http\Livewire\Tasks;

use App\Actions\Tasks\SoftDeleteTask;
use App\Models\Task;
use LaravelViews\Actions\RedirectAction;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;

class TasksTableView extends TableView
{
    public $searchBy = ['name'];
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
            Header::title(__('translation.attributes.name'))->sortBy('name'),
            'Projekt',
            Header::title(__('translation.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('translation.attributes.updated_at'))->sortBy('updated_at'),
            Header::title(__('translation.attributes.deleted_at'))->sortBy('deleted_at'),
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
            $task->projects->name??"",
            $task->created_at,
            $task->updated_at,
            $task->deleted_at,

        ];
    }

    protected function actionsByRow()
    {
        return [
            new RedirectAction('materialtasks.create','Add material','plus'),
            new RedirectAction('tasks.edit', 'Edytuj', 'edit'),
            new SoftDeleteTask()
        ];
    }
}
