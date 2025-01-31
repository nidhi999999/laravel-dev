<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobPost;

class JobPostSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Attach skills to job posts
        $jobPost = JobPost::find(1);

        $jobPost->skills()->attach([1]);
    }
}
