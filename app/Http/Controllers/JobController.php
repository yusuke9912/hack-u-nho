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
        return \DB::table('jobs')->where('job_receiver',Auth::id() )->join('users','jobs.job_requester','=','users.id')->orderBy('jobs.updated_at', 'asc')
        ->get(['jobs.id','title','description','users.sei','users.mei']);
    }

    public function show(Job $job)
    {
        Log::Debug($job);
        return \DB::table('jobs')->where('jobs.id',$job->id)->join('users','jobs.job_requester','=','users.id')->orderBy('jobs.updated_at', 'asc')->get();
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
