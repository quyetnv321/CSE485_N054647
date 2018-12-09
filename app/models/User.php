<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //
    protected $table = 'users';
    
    protected $fillable = [
        'user_name',
        'name',
        'sex',
        'birthday',
        'email',
        'phone',
        'level',
        'phone',
        'created_at',
    ];
    
    protected $guarded = [
        'id'
    ];
    
    protected $hidden = ['password', 'remember_token'];
}
