<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'Tasks';


    protected $fillable = [
        'ID',
        'name',
        'date',
        'project_id',
        'worker_id',
        'created_at',
        'update_at',
    ];

    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function workers()
    {
       // return $this->belongsToMany(Worker::class, 'worker_id')->withTrashed();
        return $this->belongsToMany(Worker::class,)->withPivot('timeWork', 'date')->withTrashed();
    }

    public function MaterialTasks()
    {
        return $this->belongsToMany(MaterialTask::class);
    }

}
