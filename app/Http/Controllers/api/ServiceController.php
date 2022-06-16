<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
  public function getAll()
  {
    return Service::all();
  }

  public function getOne(Request $request)
  {
    return Service::where('id', $request->id)->first();
  }

  public function save(Request $request)
  {
    // TODO add file upload trait
    return Service::create([
      'image'                   =>  $request->input('image'),
      'name'                    =>  $request->input('name'),
      'description'             =>  $request->input('description'),
      'other_advantage'         =>  $request->input('other_advantage'),
      'service_conditions'      =>  $request->input('service_conditions'),
      'category_id'             =>  $request->input('category_id'),
    ]);
  }

  public function update(Request $request)
  {
    // TODO add file  upload trait
    $res = Service::where('id', $request->id)->update([
      'image'                   =>  $request->input('image'),
      'name'                    =>  $request->input('name'),
      'description'             =>  $request->input('description'),
      'other_advantage'         =>  $request->input('other_advantage'),
      'service_conditions'      =>  $request->input('service_conditions'),
      'category_id'             =>  $request->input('category_id'),
    ]);

    return $res ? ['message' => "Service data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request)
  {
    $res = Service::where('id', $request->id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
