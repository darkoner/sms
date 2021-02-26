<?php

namespace App\Models\Attendance;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';

    protected $fillable = [
        'semester_id',
        'subject_id',
        'student_id',
        'status',
        'date'
    ];
}
