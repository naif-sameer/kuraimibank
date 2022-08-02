<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FinancialReportRequest;
use App\Http\Resources\FinancialReportResource;
use App\Models\FinancialReport;
use Illuminate\Http\Request;

class FinancialReportController extends Controller
{
  public function index(Request $request)
  {
    return FinancialReportResource::collection(FinancialReport::paginate($request->resultsPerPage ?? 10));
  }

  public function show(FinancialReport $financialReport)
  {
    return new FinancialReportResource($financialReport);
  }

  public function store(FinancialReportRequest $request)
  {
    $fileName = $this->storeFile($request->file('pdf'), 'pdf');

    return FinancialReport::create([
      'title'             =>  (array) json_decode($request->title),
      'description'       =>  (array) json_decode($request->description),
      'pdf'               =>  $fileName,
    ]);
  }

  public function update(FinancialReportRequest $request, FinancialReport $financialReport)
  {
    $oldFileName = $financialReport->pdf;

    if ($request->file('pdf')) $fileName = $this->updateFile($request->file('pdf'), 'pdf', $oldFileName);

    $res = $financialReport->update([
      'title'             =>  (array) json_decode($request->title),
      'description'       =>  (array) json_decode($request->description),
      'pdf'               =>  $fileName ?? $oldFileName,
    ]);

    return $res ? ['message' => "FinancialReport data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, FinancialReport $financialReport)
  {
    $res = $financialReport->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
