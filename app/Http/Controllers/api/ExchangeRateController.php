<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{
  public function getAll()
  {
    return ExchangeRate::all();
  }

  public function getOne(Request $request)
  {
    return ExchangeRate::where('id', $request->id)->first();
  }

  public function save(Request $request)
  {
    return ExchangeRate::create([
      'name'       =>  $request->input('name'),
      'sale'       =>  $request->input('sale'),
      'buy'        =>  $request->input('buy')
    ]);
  }

  public function update(Request $request)
  {
    $res = ExchangeRate::where('id', $request->id)
      ->update([
        'name'       =>  $request->input('name'),
        'sale'       =>  $request->input('sale'),
        'buy'        =>  $request->input('buy')
      ]);

    return $res ? ['message' => "ExchangeRate data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request)
  {
    $res = ExchangeRate::where('id', $request->id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
