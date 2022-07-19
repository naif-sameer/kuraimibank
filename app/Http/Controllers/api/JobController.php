<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Http\Resources\JobResource;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
  public function index(Request $request)
  {
    return JobResource::collection(Job::paginate($request->resultsPerPage ?? 10));
  }

  public function show(Job $job)
  {
    return new JobResource($job);
  }

  public function store(JobRequest $request)
  {
    return Job::create($request->only(['title', 'description']));
  }

  public function update(JobRequest $request, Job $job)
  {
    $res = $job->update($request->only(['title', 'description']));

    return $res ? ['message' => "job data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, Job $job)
  {
    $res = $job->update($request->only(['is_active']));

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
