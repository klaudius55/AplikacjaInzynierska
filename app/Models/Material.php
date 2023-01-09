<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'materials';


    protected $fillable = [
        'ID',
        'name',
        'thickness',
        'type_id',
        'unit_id',
        'created_at',
        'updated_at',


    ];

    public function types()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function units()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function task()
    {
        return $this->belongsToMany(Task::class)
            ->withTimestamps();
    }


}
