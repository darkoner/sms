<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class QuizQuestionOption extends Model
{
    protected $table = 'quiz_question_option';
    protected $fillable = [
        'quiz_question_id',
        'option'
    ];
}
