<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\WebsiteInfo;
use Illuminate\Http\Request;

class ServicePointsController extends Controller
{
  public function index()
  {
    $servicePointInfo['title'] = WebsiteInfo::where('table_key', 'service_points_title')->first()->table_value;
    $servicePointInfo['description'] = WebsiteInfo::where('table_key', 'service_points_description')->first()->table_value;

    return view('web.service-points')
      ->with('servicePointInfo', (object)$servicePointInfo);
  }
}
