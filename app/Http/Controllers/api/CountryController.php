<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
  public function getAll()
  {
    return Country::all();
  }

  public function getOne(Country $country)
  {
    return $country->first();
  }

  public function save(CountryRequest $request)
  {
    return Country::create([
      'name'         =>  $request->input('name'),
      'country_code' =>  $request->input('country_code'),
    ]);
  }

  public function update(CountryRequest $request, Country $country)
  {
    $res = $country->update(['name' => $request->input('name')]);

    return $res ? ['message' => "Country data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, Country $country)
  {
    // return $request->all();

    $res = $country->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
