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
        "id" => "1",
        "name" => ["ar" => "خدمات الأفراد", "en" => ""],
      ],
      [
        "id" => "2",
        "name" => ["ar" => "خدمات الشركات", "en" => ""],
      ],
      [
        "id" => "3",
        "name" => ["ar" => "كريمي اكسبرس", "en" => ""],
      ],
      [
        "id" => "4",
        "name" => ["ar" => "أم فلوس", "en" => ""],
      ],
      [
        "id" => "5",
        "name" => ["ar" => "التمويل", "en" => ""],
      ],
      [
        "id" => "6",
        "name" => ["ar" => "تطبيقات البنك", "en" => ""],
      ],
    ];

    View::share([
      'locale'  => App::getLocale(),
      "navItems" => $navItems
    ]);
  }
}
