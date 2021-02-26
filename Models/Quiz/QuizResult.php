<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    protected $table = 'quiz_result';

    protected $fillable = [
        'student_id',
        'quiz_id',
        'obtained_marks',
        'is_pass'
    ];
}
