<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class StudentElective extends Model
{
    protected $table = 'student_elective';

    protected $fillable = [
        'student_id',
        'subject_id'];
}
