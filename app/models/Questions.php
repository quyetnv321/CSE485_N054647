<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    //
    //
    protected $table = 'questions';
    
    protected $fillable = [
        'content',
        'answerA',
        'answerB',
        'answerC',
        'answerD',
        'right_answer',
        'time',
        'level',
        'created_at',
        'updated_at',
    ];
    
    protected $guarded = [
        'id'
    ];
    
    protected $hidden = [];
}
