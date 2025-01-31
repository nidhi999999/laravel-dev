<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\JobPost;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{

    public function index(Request $request) {
        $searchTitle = $request->query('searchTitle', '');
        $searchLocation = $request->query('searchLocation', '');

        $jobPosts = JobPost::with('skills')
            ->when($searchTitle, fn($query) => $query->where('title', 'like', "%$searchTitle%"))
            ->when($searchLocation, fn($query) => $query->where('location', 'like', "%$searchLocation%"))
            ->get()
            ->map(function ($job) {
                $job->company_logo_url = $job->company_logo ? Storage::url($job->company_logo) : url('/logo-3.svg');
                return $job;
            });
        return Inertia::render('Dashboard', ['jobPosts' => $jobPosts]);
    }
}