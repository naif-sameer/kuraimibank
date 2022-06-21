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

  public function getOne(Request $request, $id)
  {
    return Country::where('id', $id)->first();
  }

  public function save(CountryRequest $request)
  {
    return Country::create([
      'name' =>  $request->input('name'),
    ]);
  }

  public function update(CountryRequest $request, $id)
  {
    $res = Country::where('id', $id)->update([
      'name' =>  $request->input('name'),
    ]);

    return $res ? ['message' => "Country data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, $id)
  {
    $res = Country::where('id', $id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
