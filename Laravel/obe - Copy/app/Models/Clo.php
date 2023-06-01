<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clo extends Model
{
    use HasFactory;

    protected $table = 'clo';

    protected $fillable = ['clo_id', 'clo_descripion', 'course_id', 'resourceperson_id'];
}
