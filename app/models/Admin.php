<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    //
    protected $table = 'admin';
    
    protected $fillable = [
        'user_name',
        'name',
        'created_at',
        'updated_at',
    ];
    
    protected $guarded = [
        'id'
    ];
    
    protected $hidden = [
        'password'
    ];
}
