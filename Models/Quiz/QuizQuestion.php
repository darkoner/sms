<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $table = 'quiz_question';

    protected $fillable = [
        'question',
        'quiz_id',
        'type',
        'question_marks'
    ];
}
