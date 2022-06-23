<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicePointRequest;
use App\Models\ServicePoint;
use Illuminate\Http\Request;

class ServicePointController extends Controller
{
  public function getAll()
  {
    return ServicePoint::all();
  }

  public function getOne(Request $request, $id)
  {
    return ServicePoint::where('id', $id)->first();
  }

  public function save(ServicePointRequest $request)
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

  public function update(ServicePointRequest $request, $id)
  {
    $res = ServicePoint::where('id', $id)->update([
      'name'          =>  $request->input('name'),
      'address'       =>  $request->input('address'),
      'working_hours' =>  $request->input('working_hours'),
      'phone'         =>  $request->input('phone'),
      'second_phone'  =>  $request->input('second_phone'),
      'city_id'       =>  $request->input('city_id'),
    ]);

    return $res ? ['message' => "ServicePoint data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, $id)
  {
    $res = ServicePoint::where('id', $id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
