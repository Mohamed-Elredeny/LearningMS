<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'question',
        'answers',
        'correct',
        'type',
        'image'
    ];
}
