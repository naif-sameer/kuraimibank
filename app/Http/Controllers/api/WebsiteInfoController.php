<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebsiteInfoRequest;
use App\Models\WebsiteInfo;
use Illuminate\Http\Request;

class WebsiteInfoController extends Controller
{
  public function getAll()
  {
    return WebsiteInfo::all();
  }

  public function getOne(Request $request, $table_key)
  {
    return WebsiteInfo::where('table_key', $table_key)->first();
  }

  public function update(WebsiteInfoRequest $request, $table_key)
  {
    $res = WebsiteInfo::where('table_key', $table_key)->update(['table_value' => $request->table_value]);

    return $res ? ['message' => "updated {$table_key}"] : ['error' => true];
  }

  public function activeToggle(Request $request, $table_key)
  {
    $res = WebsiteInfo::where('table_key', $table_key)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated for {$table_key}"] : ['error' => true];
  }
}
