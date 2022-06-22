<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceAdvantageRequest;
use App\Models\ServiceAdvantage;
use Illuminate\Http\Request;

class ServiceAdvantageController extends Controller
{
  public function getAll()
  {
    return ServiceAdvantage::all();
  }

  public function getOne(Request $request, $id)
  {
    return ServiceAdvantage::where('id', $id)->first();
  }

  public function save(ServiceAdvantageRequest $request)
  {
    $fileName = $this->storeImage($request->file('icon'));

    return ServiceAdvantage::create([
      'name'             =>  $request->input('name'),
      'service_id'       =>  $request->input('service_id'),
      'icon'             =>  $fileName,
    ]);
  }

  public function update(ServiceAdvantageRequest $request, $id)
  {
    $oldFileName = ServiceAdvantage::where('id', $id)->first()->icon;

    if ($request->file('icon')) $fileName = $this->updateImage($request->file('icon'), $oldFileName);
    else $fileName = $oldFileName;

    $res = ServiceAdvantage::where('id', $id)->update([
      'name'             =>  $request->input('name'),
      'service_id'       =>  $request->input('service_id'),
      'icon'             =>  $fileName,
    ]);

    return $res ? ['message' => "ServiceAdvantage data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, $id)
  {
    $res = ServiceAdvantage::where('id', $id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
