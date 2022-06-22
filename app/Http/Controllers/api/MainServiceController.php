<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainServiceRequest;
use App\Models\MainService;
use Illuminate\Http\Request;

class MainServiceController extends Controller
{
  public function getAll()
  {
    return MainService::all();
  }

  public function getOne(Request $request, $id)
  {
    return MainService::where('id', $id)->first();
  }

  public function save(MainServiceRequest $request)
  {
    $fileName = $this->storeImage($request->file('image'));

    return MainService::create([
      'name'    =>  $request->input('name'),
      'link'    =>  $request->input('link'),
      'image'   =>  $fileName,
    ]);
  }

  public function update(MainServiceRequest $request, $id)
  {
    $oldFileName = MainService::where('id', $id)->first()->image;

    if ($request->file('image')) $fileName = $this->updateImage($request->file('image'), $oldFileName);
    else $fileName = $oldFileName;

    $res = MainService::where('id', $id)->update([
      'name'    =>  $request->input('name'),
      'link'    =>  $request->input('link'),
      'image'   =>  $fileName,
    ]);

    return $res ? ['message' => "MainService data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, $id)
  {
    $res = MainService::where('id', $id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
