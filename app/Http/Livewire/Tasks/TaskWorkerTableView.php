<?php

namespace App\Http\Livewire\Tasks;

use App\Actions\DeleteTaskWorker;
use App\Models\TaskWorker;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\TableView;
use WireUi\Traits\Actions;

class TaskWorkerTableView extends TableView
{
    use Actions;
    /**
     * Sets a model class to get the initial data
     */
    public function repository(): Builder
    {
        $query = TaskWorker::query()
            ->where('task_id',request()->task->id
            );
        return $query;
    }
    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            'Imię',
            'Nazwisko',
            'Ilość godzin',
            'Utworzono'
        ];
    }
    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row(TaskWorker $taskworker): array
    {
        return [
            $taskworker->worker->name??'',
            $taskworker->worker->surname??'',
            $taskworker->timeWork,
            $taskworker->created_at
        ];
    }
}
