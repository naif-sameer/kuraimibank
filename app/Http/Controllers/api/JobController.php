<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
  public function getAll()
  {
    return Job::all();
  }

  public function getOne(Request $request)
  {
    return Job::where('id', $request->id)->first();
  }

  public function save(Request $request)
  {

    return Job::create([
      'title'       =>  $request->input('title'),
      'description' =>  $request->input('description')
    ]);
  }

  public function update(Request $request)
  {
    $res = Job::where('id', $request->id)
      ->update([
        'title'       => $request->input('title'),
        'description' => $request->input('description')
      ]);

    return $res ? ['message' => "job data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request)
  {
    $res = Job::where('id', $request->id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
