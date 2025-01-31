<?php

use App\Models\JobPost;
use Illuminate\Http\Request;

Route::middleware('auth:sanctum')->get('/job-posts', function (Request $request) {
    return JobPost::with('skills')->get();
});