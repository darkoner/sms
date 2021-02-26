<?php

namespace App\Models\Assignment;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $table = 'assignment';

    protected $fillable = [
        'course_id',
        'semester_id',
        'subject_id',
        'faculty_id',
        'topic',
        'file',
        'submission_date',
        'is_assignment'
    ];
}
