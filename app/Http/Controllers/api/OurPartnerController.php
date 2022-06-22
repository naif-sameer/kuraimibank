<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OurPartnerRequest;
use App\Models\OurPartner;
use Illuminate\Http\Request;

class OurPartnerController extends Controller
{
  public function getAll()
  {
    return OurPartner::all();
  }

  public function getOne(Request $request, $id)
  {
    return OurPartner::where('id', $id)->first();
  }

  public function save(OurPartnerRequest $request)
  {
    $fileName = $this->storeImage($request->file('image'));

    return OurPartner::create([
      'title'             =>  $request->input('title'),
      'description'       =>  $request->input('description'),
      'image'             =>  $fileName,
    ]);
  }

  public function update(OurPartnerRequest $request, $id)
  {
    $oldFileName = OurPartner::where('id', $id)->first()->image;

    if ($request->file('image')) $fileName = $this->updateImage($request->file('image'), $oldFileName);
    else $fileName = $oldFileName;


    $res = OurPartner::where('id', $id)->update([
      'title'             =>  $request->input('title'),
      'description'       =>  $request->input('description'),
      'image'             =>  $fileName,
    ]);

    return $res ? ['message' => "OurPartner data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, $id)
  {
    $res = OurPartner::where('id', $id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
