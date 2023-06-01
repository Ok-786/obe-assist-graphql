<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Models\CourseAssessment;
use App\Models\AssessmentActivity;
use Illuminate\Support\Facades\DB;

class AssessmentActivityController extends Controller
{
    public function index(){
        $assessment_activities = AssessmentActivity::all();
        return view('assessment-activities.index', compact('assessment_activities'));
    }

    public function getCourses(){
        $courses = Course::all();
        return view('assessment-activities.courses', compact('courses'));
    }

    public function getCourseAssessments($course_id){
        $course_assessments = CourseAssessment::where('course_id', $course_id)->get();
        return view('assessment-activities.course-assessments', compact('course_assessments', 'course_id'));
    }


    public function create($course_id, $course_assessment_id){
        $assessments = Assessment::all();
        return view('assessment-activities.create', compact('assessments','course_id', 'course_assessment_id'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'assessmentactivity_id' => 'required',
            'courseassessment_id' => 'required|integer',
            'weightage' => 'required|integer',
            'type' => 'required|string',
        ]);

        $query = "INSERT INTO assessment_activities (assessmentactivity_id, courseassessment_id, weightage, type) VALUES (:assessmentactivity_id, :courseassessment_id, :weightage, :type)";
        DB::insert($query, [
            'assessmentactivity_id' => $validatedData['assessmentactivity_id'],
            'courseassessment_id' => $validatedData['courseassessment_id'],
            'weightage' => $validatedData['weightage'],
            'type' => $validatedData['type'],
        ]);

        return redirect()->route('assessment-activities.index')->with('success', 'Course Assessment created successfully.');
    }

}
