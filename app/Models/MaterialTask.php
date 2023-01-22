<?php

namespace App\Models;
use App\Models\Material;
use App\Models\Task;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @method attach(MaterialTask $materialTask, array $array)
 */
class MaterialTask extends Pivot
{
public function material(){
    return $this->belongsTo(Material::class);
}
    public function task(){
        return $this->belongsTo(Task::class);
    }
}
