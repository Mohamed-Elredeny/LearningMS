<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserAnswers extends Model
{
    protected $table = 'user_answers';
    protected $fillable = [
        'all_quize_id',
        'user_id',
        'mark',
        'wrog_answers',
        'answers'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function quiz(){
        return $this->belongsTo(AllQuizes::class,'all_quize_id');
    }
}
