<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peo extends Model
{
    use HasFactory;

    protected $table = 'peo';

    protected $fillable = ['peo_id', 'peo_description', 'program_id', 'schema_id'];
}
