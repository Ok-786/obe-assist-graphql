<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Learner;
use Illuminate\Http\Request;
use App\Models\CourseAssessment;
use App\Models\AssessmentActivity;
use App\Models\CourseRegistration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LearnerController extends Controller
{
    public function index($course_id){
        $learners = Learner::all();
        return view('learners.index', compact('learners', 'course_id'));
    }


    public function activities($course_id, $learner_id)
    {

        return view('mark-courses.activities', compact('course_id', 'learner_id'));
    }

    public function markActivities($course_id, $learner_id, $course_assessment_id){
        $assessment_activities = AssessmentActivity::where('courseassessment_id', $course_assessment_id)->get();
        return view('mark-courses.mark-activity', compact('course_id', 'learner_id', 'course_assessment_id', 'assessment_activities'));
    }

    public function create($course_id, $learner_id, $course_assessment_id, $assessmentactivity_id){
        return view('mark-courses.create', compact('course_id','learner_id', 'course_assessment_id', 'assessmentactivity_id'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'assessmentattempt_id' => 'required|integer',
            'learner_id' => 'required|integer',
            'courseassessment_id' => 'required|integer|max:255',
            'assessmentactivity_id' => 'required|integer|max:255',
            'marks' => 'required|integer|max:255',
        ]);

        $query = "INSERT INTO assessment_attempts (assessmentattempt_id, learner_id, course_assessment_id, assessmentactivity_id, marks) VALUES (:assessmentattempt_id, :learner_id, :courseassessment_id, :assessmentactivity_id, :marks)";
        DB::insert($query, [
            'assessmentattempt_id' => $validatedData['assessmentattempt_id'],
            'learner_id' => $validatedData['learner_id'],
            'courseassessment_id' => $validatedData['courseassessment_id'],
            'assessmentactivity_id' => $validatedData['assessmentactivity_id'],
            'marks' => $validatedData['marks'],
        ]);

        return redirect()->back()->with('success', 'Course Assessment created successfully.');

    }

}
