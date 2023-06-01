<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Models\CourseAssessment;
use Illuminate\Support\Facades\DB;

class CourseAssessmentController extends Controller
{
    public function index(){
        $course_assessments = CourseAssessment::all();
        $assessments = Assessment::all();
        $courses = Course::all();
        return view('course-assessments.index', compact('course_assessments', 'assessments', 'courses'));
    }

    public function getCourses(){
        $courses = Course::all();
        return view('course-assessments.courses', compact('courses'));
    }

    public function create($course_id){
        $assessments = Assessment::all();
        $courses = Course::all();

        //Retrieve Assessment Types


        $course_assessments = CourseAssessment::where('course_id', $course_id)->get();
        return view('course-assessments.create', compact('assessments', 'courses', 'course_assessments', 'course_id'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_assessment_id' => 'required|integer',
            'assessment_id' => 'required|string|max:255',
            'course_id' => 'required|string|max:255',
        ]);

        $query = "INSERT INTO course_assessments (course_assessment_id, assessment_id, course_id, resourceperson_id) VALUES (:course_assessment_id, :assessment_id, :course_id, :resource_person_id)";
        DB::insert($query, [
            'course_assessment_id' => $validatedData['course_assessment_id'],
            'assessment_id' => $validatedData['assessment_id'],
            'course_id' => $validatedData['course_id'],
            'resource_person_id' => 1,
        ]);

        return redirect()->route('course-assessments.index')->with('success', 'Course Assessment created successfully.');
    }

}
