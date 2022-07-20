<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceAdvantageRequest;
use App\Http\Resources\ServiceAdvantageResource;
use App\Models\ServiceAdvantage;
use Illuminate\Http\Request;

class ServiceAdvantageController extends Controller
{
  public function index(Request $request)
  {
    return ServiceAdvantageResource::collection(ServiceAdvantage::paginate($request->resultsPerPage ?? 10));
  }

  public function show(ServiceAdvantage $serviceAdvantage)
  {
    return new ServiceAdvantageResource($serviceAdvantage);
  }

  public function store(ServiceAdvantageRequest $request)
  {
    return ServiceAdvantage::create($request->only(['title', 'description', 'service_id']));
  }

  public function update(ServiceAdvantageRequest $request, ServiceAdvantage $serviceAdvantage)
  {
    $res = $serviceAdvantage->update($request->only(['title', 'description']));

    return $res ? ['message' => "ServiceAdvantage data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, ServiceAdvantage $serviceAdvantage)
  {
    $res = $serviceAdvantage->update($request->only(['is_active']));

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
