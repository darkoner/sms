<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    //
    protected $table='semester';

    protected $fillable=['semester_name',
        'course_id'];

    public static function getSemester()
{
    return \DB::table('semester')
        ->leftjoin('course', 'course.id', '=', 'semester.course_id')
        ->select('semester.*', 'course.name as course_name')
        ->get();
}
}
