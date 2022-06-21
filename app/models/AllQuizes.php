<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AllQuizes extends Model
{
    protected $table = 'all_quizes';
    protected $fillable = [
        'type',
        'name',
        'description',
        'total_score',
        'total_question_num',
        'time_of_quiz',
        'from',
        'to',
        'groups_teacher_id',
        'group_id',
        'is_publisher',
        'show_wrong_answers',
        'show_all_answers',
        'show_right_answers'
    ];
}
