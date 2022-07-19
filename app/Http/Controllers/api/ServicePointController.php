<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicePointRequest;
use App\Http\Resources\ServicePointResource;
use App\Models\City;
use App\Models\Country;
use App\Models\ServicePoint;
use Illuminate\Http\Request;

class ServicePointController extends Controller
{
  public function index(Request $request)
  {
    return ServicePointResource::collection(ServicePoint::paginate($request->resultsPerPage ?? 10));
  }

  public function show(ServicePoint $servicePoint)
  {
    return new ServicePointResource($servicePoint);
  }

  public function getCityId($address)
  {
    // check if city exists
    $city = City::where('city_code', $address['city_code'])->first();
    if ($city) return $city->id;

    $country = Country::where('country_code', $address['country_code'])->first();

    // create country if not exists
    if (!$country) {
      $country = Country::create([
        "title"           => $address['country_name'],
        "country_code"    => $address['country_code'],
      ]);
    }

    // create city
    $city = City::create([
      "title"       => $address['city_name'],
      "city_code"   => $address['city_code'],
      "country_id"  => $country->id,
    ]);

    return $city->id;
  }

  public function store(ServicePointRequest $request)
  {
    $cityID =  $this->getCityId($request->addressDetails);

    return ServicePoint::create([
      'title'         =>  $request->title,
      'address'       =>  $request->address,
      'working_hours' =>  $request->working_hours,
      'phone'         =>  $request->phone,
      'second_phone'  =>  $request->second_phone,
      'city_id'       =>  $cityID,
    ]);
  }

  public function update(ServicePointRequest $request, ServicePoint $servicePoint)
  {
    $res = $servicePoint->update($request->only([
      'title', 'address', 'working_hours', 'phone', 'second_phone', 'city_id'
    ]));

    return $res ? ['message' => "ServicePoint data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, ServicePoint $servicePoint)
  {
    $res = $servicePoint->update($request->only(['is_active']));

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
