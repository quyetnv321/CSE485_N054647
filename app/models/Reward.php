<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    //
    //
    protected $table = 'reward';
    
    protected $fillable = [
        'name',
        'donor',
        'price',
        'level',
        'created_at',
        'updated_at',
    ];
    
    protected $guarded = [
        'id'
    ];
    
    protected $hidden = [];
}
