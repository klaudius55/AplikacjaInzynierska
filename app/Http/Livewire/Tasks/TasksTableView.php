<?php

namespace App\Http\Livewire\Tasks;

use App\Actions\Tasks\EditTask;
use App\Actions\Tasks\RegisterUsedMaterial;
use App\Actions\Tasks\RegisterWorker;
use App\Actions\Tasks\SoftDeleteTask;
use App\Actions\Tasks\ViewMaterial;
use App\Actions\Tasks\ViewWorker;
use App\Actions\Tasks\RestoreTask;
use App\Filters\ProjectFilter;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use WireUi\Traits\Actions;

class TasksTableView extends TableView
{
    protected function filters()
    {
        return [
            new ProjectFilter(),
        ];
    }
    use Actions;
    public $searchBy = ['name','projects.name'];
    /**
     * Sets a model class to get the initial data
     */
    public function repository(): Builder
    {
        return Task::query()->withTrashed();
    }
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
            Header::title('Projekt')->sortBy('project_id'),
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
            new ViewMaterial('tasks.show','Wyświetl zużyty materiał','arrow-up-left'),
            new RegisterUsedMaterial('tasks.registerUsedMaterial','Rejestruj materiał','plus'),
            new RegisterWorker('tasks.registerWorker','Rejestruj pracownika','user-plus'),
            new ViewWorker('tasks.showWorker','Wyświetl pracownika','user'),
            new EditTask('tasks.edit', 'Edytuj', 'edit'),
            new RestoreTask(),
            new SoftDeleteTask()
        ];
    }
    public function softDelete(int $id){
        $task =Task::find($id);
        $task->delete();
        $this->notification()->success(
            $title = __('translation.messages_tasks.successes.destroy_title'),
            $description = __('translation.messages_tasks.successes.destroy',['name' => $task->name])
        );
    }
    public function restore(int $id){
        $task = Task::withTrashed()->find($id);
        $task->restore();
        $this->notification()->success(
            $title = __('translation.messages_tasks.successes.restore_title'),
            $description = __('translation.messages_tasks.successes.restore',['name' => $task->name])
        );
    }
}
