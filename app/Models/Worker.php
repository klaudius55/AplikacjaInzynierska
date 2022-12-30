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
        'task_id',
        'created_at',
        'update_at',
    ];

    public function tasks()
    {
       // return $this->belongsToMany(Task::class);
        return $this->belongsToMany(Task::class)->withPivot('timeWork', 'date');

    }


}
