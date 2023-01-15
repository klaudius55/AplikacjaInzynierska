<?php

namespace App\Http\Livewire\Tasks;

use App\Actions\Tasks\SoftDeleteTask;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
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
  /*  public function repository(): Builder
    {
        $query = Task::query()
            ->with(['materials']);
        if (request()->user()->can('name', Task::class)) {
            $query->withTrashed();
        }
        return $query;

    }*/
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
            //'Materiał',
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
           // $task->materials,
            $task->created_at,
            $task->updated_at,
            $task->deleted_at,

        ];
    }

    protected function actionsByRow()
    {
        return [
            new RedirectAction('tasks.registerUsedMaterial','Rejestruj materiał','plus'),
            new RedirectAction('tasks.show','Wyświetl zużyty materiał','arrow-up-left'),
            new RedirectAction('tasks.registerWorker','Rejestruj pracownika','user-plus'),

            new RedirectAction('tasks.edit', 'Edytuj', 'edit'),
            new SoftDeleteTask()
        ];
    }

  /*  public function viewMaterial(Task $task){
        $query = Task::query()
            ->with(['materials']);
        if (request()->user()->can('name', Task::class)) {
            $query->withTrashed();
        }
        return $query;
    }*/
}
