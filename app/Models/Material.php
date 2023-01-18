<?php

namespace App\Models;
//use App\Models\MaterialTask;
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

    //protected $appends = ['select_name'];

    public function types()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function units()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class)
            ->withPivot('quantity')
            ->using(MaterialTask::class);

    }


}
