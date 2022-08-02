<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OurPartnerRequest;
use App\Http\Resources\OurPartnerResource;
use App\Models\OurPartner;
use Illuminate\Http\Request;

class OurPartnerController extends Controller
{
  public function index(Request $request)
  {
    return OurPartnerResource::collection(OurPartner::paginate($request->resultsPerPage ?? 10));
  }

  public function show(OurPartner $ourPartner)
  {
    return new OurPartnerResource($ourPartner);
  }

  public function store(OurPartnerRequest $request)
  {
    $fileName = $this->storeImage($request->file('image'));

    return OurPartner::create([
      'title'             => (array) json_decode($request->title),
      'description'       => (array) json_decode($request->description),
      'image'             => $fileName,
    ]);
  }

  public function update(OurPartnerRequest $request, OurPartner $ourPartner)
  {
    $oldFileName = $ourPartner->image;

    if ($request->file('image')) $fileName = $this->updateImage($request->file('image'), $oldFileName);
    else $fileName = $oldFileName;

    $res = $ourPartner->update([
      'title'             => (array) json_decode($request->title),
      'description'       => (array) json_decode($request->description),
      'image'             => $fileName,
    ]);

    return $res ? ['message' => "OurPartner data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, OurPartner $ourPartner)
  {
    $res = $ourPartner->update($request->only(['is_active']));

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
