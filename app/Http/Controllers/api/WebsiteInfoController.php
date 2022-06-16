<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\WebsiteInfo;
use Illuminate\Http\Request;

class WebsiteInfoController extends Controller
{
  public function getAll()
  {
    return WebsiteInfo::all();
  }

  public function getOne(Request $request)
  {
    return WebsiteInfo::where('table_key', $request->table_key)->first();
  }

  public function update(Request $request)
  {
    $res = WebsiteInfo::where('table_key', $request->table_key)
      ->update(['table_value' => $request->table_value]);

    return $res ? ['message' => "updated {$request->table_key}"] : ['error' => true];
  }

  public function activeToggle(Request $request)
  {
    $res = WebsiteInfo::where('table_key', $request->table_key)
      ->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated for {$request->table_key}"] : ['error' => true];
  }
}
