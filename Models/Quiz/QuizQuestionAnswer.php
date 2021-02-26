<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class QuizQuestionAnswer extends Model
{
    protected $table = 'quiz_answer';

    protected $fillable = [
        'answer',
        'quiz_question_id',
        'quiz_question_option_id'
    ];
}
