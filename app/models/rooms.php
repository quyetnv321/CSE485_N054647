<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class rooms extends Model
{
    //
    protected $table = 'rooms';
    
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];
    
    protected $guarded = [
        'id'
    ];
    
    protected $hidden = [];
}
