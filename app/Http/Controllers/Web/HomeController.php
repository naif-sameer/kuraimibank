<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\ExchangeRate;
use App\Models\MainService;
use App\Models\News;
use App\Models\OurPartner;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  public function index()
  {

    $currencies  = ExchangeRate::take(3)->get();

    $mainServices =  Service::where('is_main_service', true)->take(5)->get();

    $news = News::take(6)->get();


    return view('web.home')
      ->with('currencies', $currencies)
      ->with('mainServices', $mainServices)
      ->with('news', $news);
  }

  public function contactUs()
  {
    return view('web.contact-us');
  }

  public function ourPartners()
  {
    // source: https://stackoverflow.com/a/66224349/19299063
    // DB::statement("SET SQL_MODE=''");

    $partners = OurPartner::whereNull('bank_messaging_country')->get();
    $bankMessagingPartners = OurPartner::whereNotNull('bank_messaging_country')->orderBy('bank_messaging_country')->get();

    return view('web.our-partners')
      ->with('partners', $partners)
      ->with('bankMessagingPartners', $bankMessagingPartners);
  }

  public function financialReports()
  {
    return view('web.financial-reports');
  }

  public function aboutUs()
  {
    return view('web.about-us');
  }
}
