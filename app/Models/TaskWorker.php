<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @method attach(TaskWorker $taskWorker, array $array)
 */
class TaskWorker extends Pivot
{
    public function worker(){
        return $this->belongsTo(Worker::class);
    }
    public function task(){
        return $this->belongsTo(Task::class);
    }
}
