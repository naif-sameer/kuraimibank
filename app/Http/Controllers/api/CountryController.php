<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
  public function getAll()
  {
    return Country::all();
  }

  public function getOne(Request $request)
  {
    return Country::where('id', $request->id)->first();
  }

  public function save(Request $request)
  {
    return Country::create([
      'name' =>  $request->input('name'),
    ]);
  }

  public function update(Request $request)
  {
    $res = Country::where('id', $request->id)->update([
      'name' =>  $request->input('name'),
    ]);

    return $res ? ['message' => "Country data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request)
  {
    $res = Country::where('id', $request->id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
