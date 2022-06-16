<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\OurPartner;
use Illuminate\Http\Request;

class OurPartnerController extends Controller
{
  public function getAll()
  {
    return OurPartner::all();
  }

  public function getOne(Request $request)
  {
    return OurPartner::where('id', $request->id)->first();
  }

  public function save(Request $request)
  {
    // TODO add image upload trait
    return OurPartner::create([
      'title'             =>  $request->input('title'),
      'image'             =>  $request->input('image'),
      'description'       =>  $request->input('description')
    ]);
  }

  public function update(Request $request)
  {
    // TODO add image upload trait
    $res = OurPartner::where('id', $request->id)
      ->update([
        'title'             =>  $request->input('title'),
        'image'             =>  $request->input('image'),
        'description'       =>  $request->input('description')
      ]);

    return $res ? ['message' => "OurPartner data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request)
  {
    $res = OurPartner::where('id', $request->id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
