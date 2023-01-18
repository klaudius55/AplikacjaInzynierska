<?php

namespace App\Http\Livewire\Tasks;

use App\Http\Livewire\Materials\MaterialsTableView;
use App\Models\Material;
use App\Models\MaterialTask;
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
      //  dd(request()->task);
       // dd(MaterialTask::first()->task);

        $query = MaterialTask::query()
            ->where('task_id',request()->task->id
            );

        return $query;
       // return Task::with('materials');
        // Materials::whereRelation('task','task_id','=',$task_id)
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
            'Materiał',
            'Grubość',
            'Rodzaj materiału',
            'Jednostka',
            'Ilość'
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row(MaterialTask $materialtask ): array
    {


        return [
            $materialtask->material->name,
            $materialtask->material->thickness,
            $materialtask->material->types->name,
            $materialtask->material->units->name,
            $materialtask->quantity,
        ];
    }
}



