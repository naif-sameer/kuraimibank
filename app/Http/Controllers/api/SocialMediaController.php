<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
  public function getAll()
  {
    return SocialMedia::all();
  }

  public function getOne(Request $request)
  {
    return SocialMedia::where('id', $request->id)->first();
  }

  public function save(Request $request)
  {
    return SocialMedia::create([
      'name'       =>  $request->input('name'),
      'link'       =>  $request->input('link'),
      'icon'       =>  $request->input('icon')
    ]);
  }

  public function update(Request $request)
  {
    $res = SocialMedia::where('id', $request->id)
      ->update([
        'name'       =>  $request->input('name'),
        'link'       =>  $request->input('link'),
        'icon'       =>  $request->input('icon')
      ]);

    return $res ? ['message' => "SocialMedia data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request)
  {
    $res = SocialMedia::where('id', $request->id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
