<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
  public function getAll()
  {
    return City::all();
  }

  public function getOne(Request $request, $id)
  {
    return City::where('id', $id)->first();
  }

  public function save(CityRequest $request)
  {
    return City::create([
      'name'        =>  $request->input('name'),
      'country_id'  =>  $request->input('country_id'),
    ]);
  }

  public function update(CityRequest $request, $id)
  {
    $res = City::where('id', $id)->update([
      'name'        =>  $request->input('name'),
      'country_id'  =>  $request->input('country_id'),
    ]);

    return $res ? ['message' => "City data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, $id)
  {
    $res = City::where('id', $id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
