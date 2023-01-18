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
        'project_id',
        'created_at',
        'updated_at',
    ];



    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function workers()
    {
        return $this->belongsToMany(Worker::class)
            -> withPivot('timeWork');

    }

    public function materials()
    {
        return $this->belongsToMany(Material::class)
            ->withPivot('quantity',)
            ->using(MaterialTask::class);

    }


}
