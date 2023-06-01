<?php

namespace App\Http\Controllers;

use App\Models\Peo;
use App\Models\Course;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create(){

        $programs = Program::all();

        return view('courses.create', compact('programs'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'course_id' => 'required|integer',
            'course_title' => 'required|string',
            'course_description' => 'required|string',
            'program_id' => 'required|string',
            'course_credits' => 'required|string',
            'course_type' => 'required|string',
            'course_code' => 'required|string',
        ]);

        $query = "INSERT INTO courses (course_id, course_title) VALUES (:course_id, :course_title)";
        DB::insert($query, [
            'course_id' => $validatedData['course_id'],
            'course_title' => $validatedData['course_title'],
        ]);

        $query2 = "INSERT INTO course_definition (course_id, course_description, program_id, course_credits, course_type, course_code, resource_person_id) VALUES (:course_id, :course_description, :program_id, :course_credits, :course_type, :course_code, :resource_person_id)";
        DB::insert($query2, [
            'course_id' => $validatedData['course_id'],
            'course_description' => $validatedData['course_description'],
            'program_id' => $validatedData['program_id'],
            'course_credits' => $validatedData['course_credits'],
            'course_type' => $validatedData['course_type'],
            'course_code' => $validatedData['course_code'],
            'resource_person_id' => 1,
        ]);

        $query3 = "INSERT INTO offered_courses (offeredcourses_id, batch_id, resourceperson_id, semester_id, course_id, is_accepted) VALUES (:offeredcourses_id, :batch_id, :resourceperson_id, :semester_id, :course_id, :is_accepted)";
        DB::insert($query3, [
            'offeredcourses_id' => $validatedData['course_id'],
            'batch_id' => 1,
            'resourceperson_id' => 1,
            'semester_id' => 1,
            'course_id' => $validatedData['course_id'],
            'is_accepted' =>'0',
        ]);

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }
}
