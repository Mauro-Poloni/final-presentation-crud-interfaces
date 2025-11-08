<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EngineeringProject extends Model
{
    use HasFactory;
    protected $fillable = ['project_name','status','description','diagram_path','lead_engineer'];
}
