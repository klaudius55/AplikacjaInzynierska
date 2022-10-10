<?php

namespace App\Http\Livewire\workers;

use App\Actions\ActivateWorkerAction;


class WorkersWithActions extends WorkersWithSortColumnsTableView
{
    protected function actionsByRow()
    {
        return [
            new ActivateWorkerAction(),

        ];
    }
}
