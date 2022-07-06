<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicePointsController extends Controller
{
  public function index()
  {
    return view('web.service-points');
  }
}
