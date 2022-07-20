<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
  public function index(Request $request)
  {
    return CityResource::collection(City::paginate($request->resultsPerPage ?? 10));
  }

  public function show(City $city)
  {
    return new CityResource($city);
  }

  public function store(CityRequest $request)
  {
    return City::create($request->only(['title', 'country_id', 'city_code']));
  }

  public function update(CityRequest $request, City $city)
  {
    $res = $city->update($request->only(['title', 'country_id']));

    return $res ? ['message' => "City data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, City $city)
  {
    $res = $city->update($request->only(['is_active']));

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
