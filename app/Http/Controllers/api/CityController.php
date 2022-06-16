<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
  public function getAll()
  {
    return City::all();
  }

  public function getOne(Request $request)
  {
    return City::where('id', $request->id)->first();
  }

  public function save(Request $request)
  {
    return City::create([
      'name'        =>  $request->input('name'),
      'country_id'  =>  $request->input('country_id'),
    ]);
  }

  public function update(Request $request)
  {
    $res = City::where('id', $request->id)->update([
      'name'        =>  $request->input('name'),
      'country_id'  =>  $request->input('country_id'),
    ]);

    return $res ? ['message' => "City data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request)
  {
    $res = City::where('id', $request->id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
