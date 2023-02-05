<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Worker extends Model
{
    use HasFactory,SoftDeletes;

protected $table = 'workers';


    protected $fillable = [
        'ID',
        'name',
        'surname',
        'created_at',
        'updated_at',
    ];

    public function tasks()
    {
        return $this->belongsToMany(Task::class)
            ->withPivot('timeWork')
            ->using(TaskWorker::class);
    }


}
