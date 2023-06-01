<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapping extends Model
{
    use HasFactory;

    protected $table = 'peo-clo-Relation';

    protected $fillable = ['peo_id', 'clo_id'];
}
