<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ServicePoint;
use Illuminate\Http\Request;

class ServicePointController extends Controller
{
  public function getAll()
  {
    return ServicePoint::all();
  }

  public function getOne(Request $request)
  {
    return ServicePoint::where('id', $request->id)->first();
  }

  public function save(Request $request)
  {
    return ServicePoint::create([
      'name'          =>  $request->input('name'),
      'address'       =>  $request->input('address'),
      'working_hours' =>  $request->input('working_hours'),
      'phone'         =>  $request->input('phone'),
      'second_phone'  =>  $request->input('second_phone'),
      'city_id'       =>  $request->input('city_id'),
    ]);
  }

  public function update(Request $request)
  {
    $res = ServicePoint::where('id', $request->id)->update([
      'name'          =>  $request->input('name'),
      'address'       =>  $request->input('address'),
      'working_hours' =>  $request->input('working_hours'),
      'phone'         =>  $request->input('phone'),
      'second_phone'  =>  $request->input('second_phone'),
      'city_id'       =>  $request->input('city_id'),
    ]);

    return $res ? ['message' => "ServicePoint data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request)
  {
    $res = ServicePoint::where('id', $request->id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
