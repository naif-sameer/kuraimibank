<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ServiceAdvantage;
use Illuminate\Http\Request;

class ServiceAdvantageController extends Controller
{
  public function getAll()
  {
    return ServiceAdvantage::all();
  }

  public function getOne(Request $request)
  {
    return ServiceAdvantage::where('id', $request->id)->first();
  }

  public function save(Request $request)
  {
    // TODO add file upload trait
    return ServiceAdvantage::create([
      'name'             =>  $request->input('name'),
      'icon'             =>  $request->input('icon'),
      'service_id'       =>  $request->input('service_id'),

    ]);
  }

  public function update(Request $request)
  {
    // TODO add file  upload trait
    $res = ServiceAdvantage::where('id', $request->id)->update([
      'name'             =>  $request->input('name'),
      'icon'             =>  $request->input('icon'),
      'service_id'       =>  $request->input('service_id'),
    ]);

    return $res ? ['message' => "ServiceAdvantage data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request)
  {
    $res = ServiceAdvantage::where('id', $request->id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
