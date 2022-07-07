<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ExchangeRate;
use App\Models\MainService;

class HomeController extends Controller
{
  public function index()
  {

    $currencies  = ExchangeRate::all();
    // $mainServices = MainService::all()->take(5);

    $mainServices = [
      [
        "id" => "1",
        "title" => ["ar" => "ماكينات الصراف الآلي"],
        "description" => ["ar" => "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل"],
        "image" => "/images/atm.png"
      ],
      [
        "id" => "2",
        "title" => ["ar" => "تمويل الملكة"],
        "description" => ["ar" => "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل"],
        "image" => "/images/atm.png"
      ],
      [
        "id" => "3",
        "title" => ["ar" => "حسابات الافراد"],
        "description" => ["ar" => "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل"],
        "image" => "/images/atm.png"
      ],
      [
        "id" => "4",
        "title" => ["ar" => "التمويل"],
        "description" => ["ar" => "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل"],
        "image" => "/images/atm.png"
      ],
      [
        "id" => "5",
        "title" => ["ar" => "البطاقات الإئتمانية"],
        "description" => ["ar" => "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل"],
        "image" => "/images/atm.png"
      ],
    ];




    return view('web.home')
      ->with('currencies', $currencies)
      ->with('mainServices', $mainServices);
  }

  public function contactUs()
  {
    return view('web.contact-us');
  }

  public function ourPartners()
  {
    return view('web.our-partners');
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
