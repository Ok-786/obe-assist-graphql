<?php

namespace App\Http\Controllers;

use App\Models\CourseRegistration;
use Illuminate\Http\Request;

class CourseRegistrationController extends Controller
{
    public function index(){
        $course_regisrtations = CourseRegistration::all();
    }
}
