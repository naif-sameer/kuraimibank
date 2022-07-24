<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
  public function service(Request $request, Service $service)
  {
    return view('web.service')
      ->with('service', $service->load(
        [
          'serviceAdvantages',
          'mainService',
          'successStories',
          'successStories.image'
        ]
      ))
      ->with('otherServices', Service::take(8)->get());
  }

  public function stroy()
  {
    return view('web.service-story');
  }
}
