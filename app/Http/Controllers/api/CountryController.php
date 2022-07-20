<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
  public function index(Request $request)
  {
    return CountryResource::collection(Country::paginate($request->resultsPerPage ?? 10));
  }

  public function show(Country $country)
  {
    return new CountryResource($country);
  }

  public function store(CountryRequest $request)
  {
    return Country::create($request->only(['title', 'country_code']));
  }

  public function update(CountryRequest $request, Country $country)
  {
    $res = $country->update($request->only(['title']));

    return $res ? ['message' => "Country data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, Country $country)
  {
    $res = $country->update($request->only(['is_active']));

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
