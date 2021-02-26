<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Settings\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('course.course');
    }

    public function getAllDetails()
    {
        return Course::all();
    }

    public function save(Request $request)
    {
        $data = $request->data;

        foreach ($data as $item)
        {
            if ($item['id'] > 0)
            {
                $course = Course::where('id', '=', $item['id'])->first();
            }
            else
            {
                $course = new Course();
            }

            $course->name = $item['name'];
            $course->save();
        }

        return $this->getAllDetails();
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $course = Course::where('id', '=', $id)->first();
        $course->delete();

        return $this->getAllDetails();
    }
}
