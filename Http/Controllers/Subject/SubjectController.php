<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Models\Settings\Course;
use App\Models\Settings\Semester;
use App\Models\Settings\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('subject.subject');
    }

    public function getAllDetails()
    {
        $data['course']= Course::all();
        $data['semester'] = Semester::all();
        $data['subject']= Subject::all();
        $data['course_sem']= Semester::getSemester();
        return $data;
    }

    public function save(Request $request)
    {
        $data = $request->data;

        foreach ($data as $item)
        {
            if ($item['id'] > 0)
            {
                $subject = Subject::where('id', '=', $item['id'])->first();
            }
            else
            {
                $subject = new Subject();
            }

            $subject->name = $item['name'];
            $subject->semester_id = $item['semester_id'];
            $subject->subject_code = $item['subject_code'];
            $subject->view_elective = $item['view_elective'];
            $subject->is_core = $item['is_core'];
            $subject->save();
        }

        return $this->getAllDetails();
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $subject = Subject::where('id', '=', $id)->first();
        $subject->delete();

        return $this->getAllDetails();
    }
}
