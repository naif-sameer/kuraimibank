<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
  public function getAll()
  {
    return Service::all();
  }

  public function getOne(Request $request, $id)
  {
    return Service::where('id', $id)->first();
  }

  public function save(ServiceRequest $request)
  {
    $fileName = $this->storeImage($request->file('image'));

    return Service::create([
      'name'                    =>  $request->input('name'),
      'description'             =>  $request->input('description'),
      'other_advantage'         =>  $request->input('other_advantage'),
      'service_conditions'      =>  $request->input('service_conditions'),
      'category_id'             =>  $request->input('category_id'),
      'image'                   =>  $fileName,
    ]);
  }

  public function update(ServiceRequest $request, $id)
  {
    $oldFileName = Service::where('id', $id)->first()->image;

    if ($request->file('image')) $fileName = $this->updateImage($request->file('image'), $oldFileName);
    else $fileName = $oldFileName;

    $res = Service::where('id', $id)->update([
      'name'                    =>  $request->input('name'),
      'description'             =>  $request->input('description'),
      'other_advantage'         =>  $request->input('other_advantage'),
      'service_conditions'      =>  $request->input('service_conditions'),
      'category_id'             =>  $request->input('category_id'),
      'image'                   =>  $fileName,
    ]);

    return $res ? ['message' => "Service data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, $id)
  {
    $res = Service::where('id', $id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
