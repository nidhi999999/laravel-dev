<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobPost;

class JobPostsTableSeeder extends Seeder
{
    public function run(): void
    {

        JobPost::create([
            'title' => 'Sr. Full Stack Developer',
            'experience' => '4-5 Yrs',
            'salary' => '4.5-8 Lacs PA',
            'location' => 'Remote',
            'description' => 'You will be responsible for designing, developing.',
            'extra' => 'Remote,Full-Time',
            'company_name' => 'DWebPixel Technologies Pvt. Ltd.',
        ]);
    }
}