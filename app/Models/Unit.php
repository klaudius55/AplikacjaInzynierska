<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'units';


    protected $fillable = [
        'ID',
        'name',
        'created_at',
        'update_at',
        ];

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
