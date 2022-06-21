<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AllQuizesQuestions extends Model
{
    protected $table = 'all_quizes_questions';
    protected $fillable = [
        'all_quize_id',
        'question_id',
    ];
    public function question()
    {
        return $this->belongsTo(Questions::class,'question_id');
    }
}
