<?php

namespace App\Providers;

use App\Models\ContactInfo;
use App\Models\OurPartner;
use App\Models\Service;
use Illuminate\Support\Facades\App;
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
  }
}
