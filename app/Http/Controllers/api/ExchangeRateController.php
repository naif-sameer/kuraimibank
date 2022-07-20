<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExchangeRateRequest;
use App\Http\Resources\ExchangeRateResource;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{
  public function index(Request $request)
  {
    return ExchangeRateResource::collection(ExchangeRate::paginate($request->resultsPerPage ?? 10));
  }

  public function show(ExchangeRate $exchangeRate)
  {
    return new ExchangeRateResource($exchangeRate);
  }

  public function store(ExchangeRateRequest $request)
  {
    return ExchangeRate::create($request->only(['title', 'sale', 'buy']));
  }

  public function update(ExchangeRateRequest $request, ExchangeRate $exchangeRate)
  {
    $res = $exchangeRate->update($request->only(['title', 'sale', 'buy']));

    return $res ? ['message' => "ExchangeRate data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, ExchangeRate $exchangeRate)
  {
    $res = $exchangeRate->update($request->only(['is_active']));

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
