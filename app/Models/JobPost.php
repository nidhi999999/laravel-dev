<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $fillable = ["title","experience","salary","location","description","company_name","company_logo","extra"];

    public function getExtraAttribute()
    {
        return $this->attributes['extra'] 
        ? array_map(function($item) {
            return trim($item, '"');
        }, explode(',', $this->attributes['extra'])) 
        : [];
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'job_post_skill')
                    ->using(JobPostSkill::class); // Explicitly use the JobPostSkill model
    }
}
