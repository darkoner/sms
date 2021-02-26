<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quiz';

    protected $fillable = [
        'semester_id',
        'subject_id',
        'name',
        'total_marks',
        'passing_marks',
        'date',
        'start_time',
        'end_time',
        'duration',
        'description',
        'is_active'
    ];

}
