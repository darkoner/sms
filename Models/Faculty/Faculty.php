<?php

namespace App\Models\Faculty;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculty';

    protected $fillable = [
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
        'status',
        'about_us'
    ];
}
