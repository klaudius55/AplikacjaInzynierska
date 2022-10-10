<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Worker extends Model
{
    use HasFactory;



    protected $fillable = [
        'ID',
        'name',
        'surname',
        'created_at',
        'update_at',
    ];

}
