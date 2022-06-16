<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\FinancialReport;
use Illuminate\Http\Request;

class FinancialReportController extends Controller
{
  public function getAll()
  {
    return FinancialReport::all();
  }

  public function getOne(Request $request)
  {
    return FinancialReport::where('id', $request->id)->first();
  }

  public function save(Request $request)
  {
    // TODO add file upload trait
    return FinancialReport::create([
      'title'             =>  $request->input('title'),
      'description'       =>  $request->input('description'),
      'pdf'               =>  $request->input('pdf'),
    ]);
  }

  public function update(Request $request)
  {
    // TODO add file  upload trait
    $res = FinancialReport::where('id', $request->id)
      ->update([
        'title'             =>  $request->input('title'),
        'description'       =>  $request->input('description'),
        'pdf'               =>  $request->input('pdf'),
      ]);

    return $res ? ['message' => "FinancialReport data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request)
  {
    $res = FinancialReport::where('id', $request->id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
