<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class GroupsUsers extends Model
{
    protected $table = 'groups_users';
    protected $fillable = [
        'user_id',
        'group_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function group()
    {
        return $this->belongsTo('App\models\Groups','group_id');
    }
}
