<?php

namespace App\Models\Assignment;

use Illuminate\Database\Eloquent\Model;

class AssignmentSubmission extends Model
{
    protected $table = 'assignment_submission';

    protected $fillable = [
        'assignment_id',
        'student_id',
        'faculty_id',
        'file',
        'date',
        'is_checked',
        'is_complete',
        'marks'
    ];
}
