<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FinancialReportRequest;
use App\Models\FinancialReport;
use Illuminate\Http\Request;

class FinancialReportController extends Controller
{
  public function getAll()
  {
    return FinancialReport::all();
  }

  public function getOne(Request $request, $id)
  {
    return FinancialReport::where('id', $id)->first();
  }

  public function save(FinancialReportRequest $request)
  {

    $fileName = $this->storeFile($request->file('pdf'), 'pdf');

    return FinancialReport::create([
      'title'             =>  $request->input('title'),
      'description'       =>  $request->input('description'),
      'pdf'               =>  $fileName,
    ]);
  }

  public function update(FinancialReportRequest $request, $id)
  {

    $oldFileName = FinancialReport::where('id', $id)->first()->pdf;

    if ($request->file('pdf')) {
      $fileName = $this->updateFile($request->file('pdf'), 'pdf', $oldFileName);
    } else {
      $fileName = $oldFileName;
    }

    $res = FinancialReport::where('id', $id)->update([
      'title'             =>  $request->input('title'),
      'description'       =>  $request->input('description'),
      'pdf'               =>  $fileName
    ]);

    return $res ? ['message' => "FinancialReport data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, $id)
  {
    $res = FinancialReport::where('id', $id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
