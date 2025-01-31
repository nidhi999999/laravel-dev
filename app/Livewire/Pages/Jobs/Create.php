<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\JobPost;
use App\Models\Skill;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $location;
    public $company_name;
    public $experience;
    public $salary;
    public $extra;
    public $skills = []; // To store selected skills
    public $availableSkills;
    public $company_logo;

    public function mount()
    {
        // Fetch all available skills to display in the form
        $this->availableSkills = Skill::all();
    }

    // Validation rules for job creation form
    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'location' => 'required|string|max:255',
        'company_name' => 'required|string|max:255',
        'experience' => 'required|string|max:1000',
        'salary' => 'required|string|max:1000',
        'extra' => 'nullable|string|max:1000',
        'skills' => 'required|array',
        'skills.*' => 'exists:skills,id', // selected skills exist in the database
        'company_logo' => 'nullable|image|max:2048',
    ];

    // Create job post with selected skills
    public function createJobPost()
    {
        $this->validate();

        $folderPath = 'public/company_logos';
        if (!Storage::exists($folderPath)) {
            Storage::makeDirectory($folderPath);
        }

        // Store the uploaded logo (if provided)
        $logoPath = $this->company_logo
            ? $this->company_logo->store('company_logos', 'public') // Save in storage/app/public/company_logos
            : null;

        // $tagsArray = $this->extra ? array_map('trim', explode(',', $this->extra)) : [];

        // Create job post
        $jobPost = JobPost::create([
            'title' => $this->title,
            'description' => $this->description,
            'location' => $this->location,
            'company_name' => $this->company_name,
            'experience' => $this->experience,
            'salary' => $this->salary,
            'extra' => $this->extra,
            'company_logo' => $logoPath,
        ]);

        // Attach selected skills to the job post
        $jobPost->skills()->attach($this->skills);

        // Reset form fields
        $this->reset();

        // Redirect or show success message
        session()->flash('message', 'Job post created successfully!');
    }

    public function render()
    {
        return view('livewire.pages.jobs.create');
    }
}
