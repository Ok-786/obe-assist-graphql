<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PeoController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\CloController;
use App\Http\Controllers\AssessmentTypesController;
use App\Models\Assessment;
use App\Models\AssessmentActivity;
use App\Models\Clo;
use App\Models\Program;
use App\Models\Peo;
use App\Models\AssessmentTypes;
use App\Models\Course;
use App\Models\CourseAssessment;
use App\Models\Learner;
use App\Models\Mapping;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('user', UserController::class);

// Route::get('/users', function () {
//     return view('users.index');
// });

// Route::resource('program', ProgramController::class);


// Route::resource('peo', PeoController::class);

// Route::resource('courses', CoursesController::class);

// Route::resource('clo', CloController::class);

// Route::resource('assessment-type', AssessmentTypesController::class);





// Route::get('/program', function () {
//     $programs = Program::all();
//     return view('programs.index', compact('programs'));
// });

// Route::get('/clos', function () {
//     $data = Clo::all();
//     return view('clo.index', compact('data'));
// });

// Route::get('/peos', function () {
//     $data = Peo::all();
//     return view('peo.index', compact('data'));
// });

// Route::get('/courses', function () {
//     $data = Courses::all();
//     return view('courses.index', compact('data'));
// });

// Route::get('/assessment-type', function () {
//     $data = AssessmentTypes::all();
//     return view('assessment-type.index', compact('data'));
// });



//------------------New Way---------------------


// Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');

// *********************************** Programs***********************************

Route::get('/programs', function () {
    $programs = Program::all();
    return view('programs.index', compact('programs'));
});

Route::get('/programs/create', [App\Http\Controllers\ProgramController::class, 'create'])->name('programs.create');

Route::post('/programs', [App\Http\Controllers\ProgramController::class, 'store'])->name('programs.store');

Route::get('/programs', [App\Http\Controllers\ProgramController::class, 'index'])->name('programs.index');


Route::get('/programs/{program}/edit', 'App\Http\Controllers\ProgramController@edit')->name('programs.edit');

Route::put('/programs/{program}', 'App\Http\Controllers\ProgramController@update')->name('programs.update');


Route::delete('/programs/{program_id}', [App\Http\Controllers\ProgramController::class, 'destroy'])->name('programs.destroy');



// Route::resource('programs', ProgramController::class);

// *********************************** PEOs***********************************

Route::get('/peo', function () {
    $peos = Peo::all();
    return view('peo.index', compact('peos'));
});

Route::get('/peo/create/{program_id}', [App\Http\Controllers\PeoController::class, 'create'])->name('peo.create');

Route::post('/peo', [App\Http\Controllers\PeoController::class, 'store'])->name('peo.store');

Route::get('/peo', [App\Http\Controllers\PeoController::class, 'index'])->name('peo.index');

Route::get('/peo/edit/{peo_id}', [App\Http\Controllers\PeoController::class, 'edit'])->name('peo.edit');

Route::put('/peo/{peo_id}', [App\Http\Controllers\PeoController::class, 'update'])->name('peo.update');

Route::delete('/peo/{peo_id}', [PeoController::class, 'destroy'])->name('peo.destroy');


// *********************************** Courses***********************************

Route::get('/courses', function () {
    $courses = Course::all();
    return view('courses.index', compact('courses'));
});

Route::get('/courses/create', [App\Http\Controllers\CourseController::class, 'create'])->name('courses.create');

Route::post('/courses', [App\Http\Controllers\CourseController::class, 'store'])->name('courses.store');

Route::get('/courses', [App\Http\Controllers\CourseController::class, 'index'])->name('courses.index');

// *********************************** CLOs***********************************

Route::get('/clos', function () {
    $clos = Clo::all();
    return view('clo.index', compact('clos'));
});

Route::get('/clo/create/{course_id}', [App\Http\Controllers\CloController::class, 'create'])->name('clo.create');

Route::post('/clo', [App\Http\Controllers\CloController::class, 'store'])->name('clo.store');

Route::get('/clo', [App\Http\Controllers\CloController::class, 'index'])->name('clo.index');

// *********************************** Assessments***********************************

Route::get('/assessments', function () {
    $assessments = Assessment::all();
    return view('assessments.index', compact('assessments'));
});

// ***********************************Course Assessments***********************************

Route::get('/course-assessments', function () {
    $course_assessments = CourseAssessment::all();
    return view('course-assessments.index', compact('course_assessments'));
});

Route::get('/course-assessments/courses/', [App\Http\Controllers\CourseAssessmentController::class, 'getCourses'])->name('course-assessments.courses');



Route::get('/course-assessments/courses/{course_id}/create', [App\Http\Controllers\CourseAssessmentController::class, 'create'])->name('course-assessments.create');



Route::post('/course-assessments', [App\Http\Controllers\CourseAssessmentController::class, 'store'])->name('course-assessments.store');

Route::get('/course-assessments', [App\Http\Controllers\CourseAssessmentController::class, 'index'])->name('course-assessments.index');

// ***********************************Mapping***********************************

Route::get('/mapping', function () {
    $mappings = Mapping::all();
    return view('mapping.index', compact('mappings'));
});

Route::get('/mapping/create', [App\Http\Controllers\MappingController::class, 'create'])->name('mapping.create');

Route::post('/mapping', [App\Http\Controllers\MappingController::class, 'store'])->name('mapping.store');

Route::get('/mapping', [App\Http\Controllers\MappingController::class, 'index'])->name('mapping.index');

// ***********************************Marking***********************************

Route::get('/marking', function () {
    return view('marking.index');
});

// ***********************************Assessment Activities***********************************

Route::get('/assessment-activities', function () {
    $assessment_activities = AssessmentActivity::all();
    return view('assessment-activities.index', compact('assessment_activities'));
});

Route::get('/assessment-activities/courses', [App\Http\Controllers\AssessmentActivityController::class, 'getCourses'])->name('assessment-activities.courses');

Route::get('/assessment-activities/courses/{course_id}/course-assessments', [App\Http\Controllers\AssessmentActivityController::class, 'getCourseAssessments'])->name('assessment-activities.course-assssmnts');


Route::get('/assessment-activities/courses/{course_id}/course-assessments/{course_assessment_id}/create', [App\Http\Controllers\AssessmentActivityController::class, 'create'])->name('assessment-activities.create');

Route::post('/assessment-activities', [App\Http\Controllers\AssessmentActivityController::class, 'store'])->name('assessment-activities.store');

Route::get('/assessment-activities', [App\Http\Controllers\AssessmentActivityController::class, 'index'])->name('assessment-activities.index');


// ***********************************Learners***********************************

Route::get('/learners', function () {
    $learners = Learner::all();
    return view('learners.index', compact('learners'));
});

Route::get('/learners/{course_id}', [App\Http\Controllers\LearnerController::class, 'index'])->name('learners.index');


// ***********************************Mark Courses***********************************
Route::get('/mark-courses', function () {
    $courses = Course::all();
    return view('mark-courses.index', compact('courses'));
});

// Route::get('/learners/{learner_id}/activities', [App\Http\Controllers\LearnerController::class, 'activities'])
//     ->name('learners.activities');

    Route::get('/courses/{course_id}/learners/{learner_id}/activities', [App\Http\Controllers\LearnerController::class, 'activities'])
    ->name('learners.activities');


    Route::get('/courses/{course_id}/learners/{learner_id}/activities/', [App\Http\Controllers\LearnerController::class, 'activities'])
    ->name('learners.activities');

    Route::get('/courses/{course_id}/learners/{learner_id}/assessments/{course_assessment_id}', [App\Http\Controllers\LearnerController::class, 'markActivities'])
    ->name('learners.markActivities');

    Route::get('/courses/{course_id}/learners/{learner_id}/assessment/{course_assessment_id}/activities/{assessmentactivity_id}/create', [App\Http\Controllers\LearnerController::class, 'create'])
    ->name('learners.create');

    Route::post('mark-courses', [App\Http\Controllers\LearnerController::class, 'store'])
    ->name('mark-courses.store');

// ***********************************Signout***********************************

Route::get('/signout', function () {
    return redirect('http://localhost:3000');
});
