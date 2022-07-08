<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Job;

class JobController extends Controller
{
    public function index()
    {
        Log::Debug("index");
        return Job::where('job_receiver', '=', Auth::id())->get();
    }

    public function show(Job $job)
    {
        return $job;
    }

    public function store(Request $request)
    {
        return Job::create($request->all());
    }

    public function update(Request $request, Job $job)
    {
        $job->update($request->all());
    
        return $job;
    }
    
    public function destroy(Job $job)
    {
        $job->delete();

        return $job;
    }

}
