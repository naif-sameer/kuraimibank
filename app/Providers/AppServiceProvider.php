<?php

namespace App\Providers;

use App\Models\ContactInfo;
use App\Models\OurPartner;
use App\Models\Service;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use stdClass;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    // navbar data :)


    $navItems = Service::where('is_main_service', true)->get();

    $footerInfo = new stdClass();
    $footerInfo->contactInfo = ContactInfo::all()->keyBy('key');
    $footerInfo->services = Service::where('is_main_service', false)->get();
    $footerInfo->OurPartners = OurPartner::whereNull('bank_messaging_country')->get();

    // dd($services);
    View::share([
      'locale'          => App::getLocale(),
      'navItems'        => $navItems,
      'footerInfo'      => $footerInfo,
    ]);
  }
}
