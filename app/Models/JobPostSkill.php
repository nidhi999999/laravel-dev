<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobPostSkill extends Pivot
{
    use HasFactory;

    protected $fillable = ['job_post_id', 'skill_id'];

}

