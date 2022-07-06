<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  public function index()
  {
    return view('web.home');
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
