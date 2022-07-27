<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Service;
use App\Models\SuccessStory;
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

  public function serviceStory(Service $service, SuccessStory $successStory)
  {

    $news = News::take(3)->get();

    // dd($news);
    return view('web.service-story')
      ->with('story', $successStory->load('images'))
      ->with('news', $news);
  }
}
