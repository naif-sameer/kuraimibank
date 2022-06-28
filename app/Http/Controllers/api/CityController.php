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
    return City::with('country')->get();
  }

  public function getOne(City $city)
  {
    return $city->load('country');
  }

  public function save(CityRequest $request)
  {
    return City::create([
      'name'          =>  $request->input('name'),
      'country_id'    =>  $request->input('country_id'),
      'city_code'  =>  $request->input('city_code'),
    ]);
  }

  public function update(CityRequest $request, City $city)
  {
    $res = $city->update([
      'name'          =>  $request->input('name'),
      'country_id'    =>  $request->input('country_id')
    ]);

    return $res ? ['message' => "City data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, City $city)
  {
    $res = $city->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
