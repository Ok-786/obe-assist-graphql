<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentAttempt extends Model
{
    use HasFactory;
    protected $table = 'assessment_attempts';
    protected $fillable = ['assessmentattempt_id', 'learner_id', 'assessmentactivity_id', 'marks', 'course_assessment_id'];
}
