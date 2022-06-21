<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $table = 'groups';

    protected $fillable = [
        'name','image'
    ];

    public function mediaGroup()
    {
        return $this->hasMany('App\models\MediaGroup','group_id');
    }
    public function userGroup()
    {
        return $this->hasMany('App\models\GroupsUsers','group_id');
    }
}
