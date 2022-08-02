<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebBaseController;
use App\Models\AboutUs;
use App\Models\ExchangeRate;
use App\Models\FinancialReport;
use App\Models\News;
use App\Models\OurPartner;
use App\Models\Service;
use App\Models\SuccessNumber;
use App\Models\TeamRole;
use App\Models\WebsiteInfo;
use stdClass;

class HomeController extends WebBaseController
{
  public function index()
  {
    $homeInfo = new stdClass();
    $homeInfo->title = WebsiteInfo::where('table_key', 'home_title')->first()->table_value;
    $homeInfo->description = WebsiteInfo::where('table_key', 'home_description')->first()->table_value;

    $homeInfo->appDescription = WebsiteInfo::where('table_key', 'home_bank_app_description')->first()->table_value;

    $currencies  = ExchangeRate::take(3)->get();

    $mainServices =  Service::where('is_main_service', true)->take(5)->get();

    $successNumbers = SuccessNumber::take(8)->get();

    $news = News::take(6)->get();


    return view('web.home')
      ->with('homeInfo', $homeInfo)
      ->with('currencies', $currencies)
      ->with('mainServices', $mainServices)
      ->with('news', $news)
      ->with('successNumbers', $successNumbers);
  }

  public function contactUs()
  {
    return view('web.contact-us');
  }

  public function ourPartners()
  {
    $partners = OurPartner::whereNull('bank_messaging_country')->get();
    $bankMessagingPartners = OurPartner::whereNotNull('bank_messaging_country')->orderBy('bank_messaging_country')->get();

    return view('web.our-partners')
      ->with('partners', $partners)
      ->with('bankMessagingPartners', $bankMessagingPartners);
  }



  public function aboutUs()
  {
    $aboutUs = AboutUs::first();
    return view('web.about-us')->with('aboutUs', $aboutUs);
  }

  public function aboutTeam()
  {

    $teamRoles = TeamRole::with('members')->get();

    // dd($teamRoles);
    return view('web.about-team')->with('teamRoles', $teamRoles);
  }

  public function financialReports()
  {
    $reports = FinancialReport::all();
    return view('web.financial-reports')->with('reports', $reports);
  }
}
