<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentActivity extends Model
{
    use HasFactory;

    protected $table = 'assessment_activities';

    protected $fillable = ['assessmentactivity_id', 'courseassessment_id', 'weightage', 'type'];


}
