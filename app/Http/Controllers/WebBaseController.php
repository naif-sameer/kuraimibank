<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use App\Models\OurPartner;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use stdClass;

class WebBaseController extends Controller
{
  public function __construct()
  {
    // navbar data :)

    $navItems = Service::where('is_main_service', true)->get();

    $footerInfo = new stdClass();
    $footerInfo->contactInfo = ContactInfo::all()->keyBy('key');
    $footerInfo->services = Service::where('is_main_service', false)->get();
    $footerInfo->OurPartners = OurPartner::whereNull('bank_messaging_country')->get();

    // dd($services);
    View::share([
      'navItems'        => $navItems,
      'footerInfo'      => $footerInfo,
    ]);
  }
}
