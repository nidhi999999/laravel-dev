<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use App\Models\JobPost;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    public $jobs;

    public function mount()
    {
        $this->jobs = JobPost::with('skills')->get();
    }

    public function deleteJob($jobId)
    {
        $job = JobPost::find($jobId);

        if ($job) {
            // Delete company logo if exists
            if ($job->company_logo) {
                Storage::delete($job->company_logo);
            }

            $job->delete();

            // Refresh the jobs list
            $this->jobs = JobPost::with('skills')->get();

            session()->flash('alert', 'Job deleted successfully.');
        }
    }

    public function render()
    {
        return view('livewire.pages.jobs.index');
    }
}
