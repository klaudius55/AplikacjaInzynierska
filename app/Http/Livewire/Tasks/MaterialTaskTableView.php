<?php

namespace App\Http\Livewire\Tasks;


use App\Models\MaterialTask;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;

class MaterialTaskTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    public function repository(): Builder
    {
        $query = MaterialTask::query()
            ->where('task_id',request()->task->id
            );
        return $query;
    }

    public function headers(): array
    {
        return [
            'Materiał',
            'Grubość',
            'Rodzaj materiału',
            'Jednostka',
            'Ilość',
            Header::title(__('translation.attributes.created_at')),
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
            $materialtask->material->name??'',
            $materialtask->material->thickness??'',
            $materialtask->material->types->name??'',
            $materialtask->material->units->name??'',
            $materialtask->quantity,
            $materialtask->created_at
        ];
    }
}



