<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
  public function service(Request $request, Service $service)
  {
    return view('web.service')->with('service', $service);
  }

  public function stroy()
  {
    return view('web.service-story');
  }
}
