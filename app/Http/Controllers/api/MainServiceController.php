<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\MainService;
use Illuminate\Http\Request;

class MainServiceController extends Controller
{
  public function getAll()
  {
    return MainService::all();
  }

  public function getOne(Request $request)
  {
    return MainService::where('id', $request->id)->first();
  }

  public function save(Request $request)
  {
    return MainService::create([
      'name'    =>  $request->input('name'),
      'image'   =>  $request->input('image'),
      'link'    =>  $request->input('link'),
    ]);
  }

  public function update(Request $request)
  {
    $res = MainService::where('id', $request->id)->update([
      'name'    =>  $request->input('name'),
      'image'   =>  $request->input('image'),
      'link'    =>  $request->input('link'),
    ]);

    return $res ? ['message' => "MainService data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request)
  {
    $res = MainService::where('id', $request->id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
