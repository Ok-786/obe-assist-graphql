<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAssessment extends Model
{
    use HasFactory;
    protected $table = 'course_assessments';
    protected $fillable = ['course_assessment_id', 'assessment_id', 'weightage', 'course_id', 'resource_person_id'];
}
