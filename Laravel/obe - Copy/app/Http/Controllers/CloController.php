<?php

namespace App\Http\Controllers;

use App\Models\Clo;
use App\Models\Course;
use function Ramsey\Uuid\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CloController extends Controller
{
    public function index(){
        $clos = Clo::all();
        return view('clo.index', compact('clos'));
    }

    public function create($course_id){
        $courses = Course::all();
        return view('clo.create', ['course_id' => $course_id, 'courses']);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'clo_id' => 'required|integer',
            'clo_description' => 'required|string',
            'course_id' => 'required|string',
            'resource_person_id' => 'required|string',
        ]);

        $query = "INSERT INTO clo (clo_id, clo_description, course_id, resource_person_id) VALUES (:clo_id, :clo_description, :course_id, :resource_person_id)";
        DB::insert($query, [
            'clo_id' => $validatedData['clo_id'],
            'clo_description' => $validatedData['clo_description'],
            'course_id' => $validatedData['course_id'],
            'resource_person_id' => $validatedData['resource_person_id'],
        ]);

        return redirect()->route('clo.index')->with('success', 'CLO created successfully.');
    }
}
