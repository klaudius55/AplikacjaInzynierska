<?php

namespace App\Http\Livewire\Tasks;

use App\Models\Material;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\TableView;

class MaterialTaskTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    public function repository(): Builder
    {
        $query = Task::query()
            ->with(['materials']);
        return $query;
    }

    /* public function repository(): Builder
     {
         return Task::query()
             ->with('materials','task');
         }
        /* $query = Task::query()
             ->with(['materials']);
         if (request()->user()->can('name', Task::class)) {
                 $query->withTrashed();

             $query->withTrashed();
         } return $query;


    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            'materials'
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

            $task->materials
            // $task->append('materials')
            // $task->load(['materials'=> fn($query)=>$query->where('material_task.id')])
        ];
    }
}



