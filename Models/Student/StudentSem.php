<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class StudentSem extends Model
{
    protected $table = 'student_sem';

    protected $fillable = [
        'student_id',
        'semester_id'
    ];
}
