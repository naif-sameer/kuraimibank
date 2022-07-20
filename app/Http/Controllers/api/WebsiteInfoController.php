<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebsiteInfoRequest;
use App\Http\Resources\WebsiteInfoResource;
use App\Models\WebsiteInfo;
use Illuminate\Http\Request;

class WebsiteInfoController extends Controller
{
  public function index(Request $request)
  {
    return WebsiteInfoResource::collection(WebsiteInfo::all());
  }

  public function show($table_key)
  {
    return new WebsiteInfoResource(WebsiteInfo::where('table_key', $table_key)->first());
  }

  public function update(WebsiteInfoRequest $request, $table_key)
  {
    $res = WebsiteInfo::where('table_key', $table_key)->update($request->only(['table_value']));

    return $res ? ['message' => "updated {$table_key}"] : ['error' => true];
  }

  public function activeToggle(Request $request, $table_key)
  {
    $res = WebsiteInfo::where('table_key', $table_key)->update($request->only(['is_active']));

    return $res ? ['message' => "active toggle updated for {$table_key}"] : ['error' => true];
  }
}
