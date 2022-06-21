<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExchangeRateRequest;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{
  public function getAll()
  {
    return ExchangeRate::all();
  }

  public function getOne(Request $request, $id)
  {
    return ExchangeRate::where('id', $id)->first();
  }

  public function save(ExchangeRateRequest $request)
  {
    return ExchangeRate::create([
      'name'       =>  $request->input('name'),
      'sale'       =>  $request->input('sale'),
      'buy'        =>  $request->input('buy')
    ]);
  }

  public function update(ExchangeRateRequest $request, $id)
  {
    $res = ExchangeRate::where('id', $id)
      ->update([
        'name'       =>  $request->input('name'),
        'sale'       =>  $request->input('sale'),
        'buy'        =>  $request->input('buy')
      ]);

    return $res ? ['message' => "ExchangeRate data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, $id)
  {
    $res = ExchangeRate::where('id', $id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
