<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainServiceRequest;
use App\Http\Resources\MainServiceResource;
use App\Models\MainService;
use Illuminate\Http\Request;

class MainServiceController extends Controller
{
  public function index(Request $request)
  {
    return MainServiceResource::collection(MainService::paginate($request->resultsPerPage ?? 10));
  }

  public function show(MainService $mainService)
  {
    return new MainServiceResource($mainService);
  }

  public function store(MainServiceRequest $request)
  {
    $fileName = $this->storeImage($request->file('image'));

    return MainService::create([
      'title'   =>  $request->title,
      'image'   =>  $fileName,
    ]);
  }

  public function update(MainServiceRequest $request, MainService $mainService)
  {
    $oldFileName = $mainService->image;

    if ($request->file('image')) $fileName = $this->updateImage($request->file('image'), $oldFileName);
    else $fileName = $oldFileName;

    $res = $mainService->update([
      'title'   =>  $request->title,
      'link'    =>  $request->link,
      'image'   =>  $fileName,
    ]);

    return $res ? ['message' => "MainService data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, MainService $mainService)
  {
    $res = $mainService->update($request->only(['is_active']));

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
