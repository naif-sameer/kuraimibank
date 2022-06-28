<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicePointRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\ServicePoint;
use Illuminate\Http\Request;

class ServicePointController extends Controller
{
  public function getAll()
  {
    return ServicePoint::with('city')->get();
  }

  public function getOne(ServicePoint $servicePoint)
  {
    return $servicePoint->load('city');
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
        "name"            => json_encode($address['country_name']),
        "country_code"    => $address['country_code'],
      ]);
    }

    // create city
    $city = City::create([
      "name"        => json_encode($address['city_name']),
      "city_code"   => $address['city_code'],
      "country_id"  => $country->id,
    ]);

    return $city->id;
  }


  public function save(ServicePointRequest $request)
  {
    $cityID =  $this->getCityId($request->input('addressDetails'));

    return ServicePoint::create([
      'name'          =>  $request->input('name'),
      'address'       =>  $request->input('address'),
      'working_hours' =>  $request->input('working_hours'),
      'phone'         =>  $request->input('phone'),
      'second_phone'  =>  $request->input('second_phone'),
      'city_id'       =>  $cityID,
    ]);
  }

  public function update(ServicePointRequest $request, $id)
  {
    $res = ServicePoint::where('id', $id)->update([
      'name'          =>  $request->input('name'),
      'address'       =>  $request->input('address'),
      'working_hours' =>  $request->input('working_hours'),
      'phone'         =>  $request->input('phone'),
      'second_phone'  =>  $request->input('second_phone'),
      'city_id'       =>  $request->input('city_id'),
    ]);

    return $res ? ['message' => "ServicePoint data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, $id)
  {
    $res = ServicePoint::where('id', $id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
