<?php

namespace App\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use Notifiable;

    protected $guard = 'teachers';

    protected $table = 'teachers';

    protected $fillable = [
       'id', 'name', 'email', 'password','phone','image','gender','real_password'
    ];

    public function groupTeacher()
    {
        return $this->hasMany('App\models\GroupsTeachers','teacher_id');
    }
}
