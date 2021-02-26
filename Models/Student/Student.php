<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';

    protected $fillable = [
        'p_no',
        'user_id',
        'name',
        'email',
        'mobile',
        'address',
        'city',
        'state',
        'dob',
        'gender',
        'marital_status',
        'status'
    ];
}
