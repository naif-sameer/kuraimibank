<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    $navItems = [
      [
        "name" => ["ar" => "خدمات الأفراد", "en" => ""],
        "link" => "/services/1"
      ],
      [
        "name" => ["ar" => "خدمات الشركات", "en" => ""],
        "link" => "/services/2"
      ],
      [
        "name" => ["ar" => "كريمي اكسبرس", "en" => ""],
        "link" => "/services/3"
      ],
      [
        "name" => ["ar" => "أم فلوس", "en" => ""],
        "link" => "/services/4"
      ],
      [
        "name" => ["ar" => "التمويل", "en" => ""],
        "link" => "/services/5"
      ],
      [
        "name" => ["ar" => "تطبيقات البنك", "en" => ""],
        "link" => "/services/6"
      ],
    ];

    View::share([
      'locale'  => App::getLocale(),
      'naif' => 'value',
      "navItems" => $navItems
    ]);
  }
}
