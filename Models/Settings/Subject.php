<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $table='subject';

    protected $fillable=['name','semester_id','subject_code','view_elective','is_core'];

}
