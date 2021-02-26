<?php

namespace App\Http\Controllers\Semester;

use App\Http\Controllers\Controller;
use App\Models\Settings\Course;
use App\Models\Settings\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('semester.semester');
    }

    public function getAllDetails()
    {

        $data['course']= Course::all();
        $data['semester'] = Semester::all();
        return $data;
    }

    public function save(Request $request)
    {
        $data = $request->data;

        foreach ($data as $item)
        {
            if ($item['id'] > 0)
            {
                $semester = Semester::where('id', '=', $item['id'])->first();
            }
            else
            {
                $semester = new Semester();
            }

            $semester->semester_name = $item['semester_name'];
            $semester->course_id = $item['course_id'];
            $semester->save();
        }

        return $this->getAllDetails();
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $course = Semester::where('id', '=', $id)->first();
        $course->delete();

        return $this->getAllDetails();
    }
}
