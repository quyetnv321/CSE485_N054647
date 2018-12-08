<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
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
