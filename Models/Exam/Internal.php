<?php

namespace App\Models\Exam;

use Illuminate\Database\Eloquent\Model;

class Internal extends Model
{

    protected $table = 'internal';

    protected $fillable = [
        'semester_id',
        'subject_id',
        'student_id',
        'marks'
    ];
}
