<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialMediaRequest;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
  public function getAll()
  {
    return SocialMedia::all();
  }

  public function getOne(Request $request, $id)
  {
    return SocialMedia::where('id', $id)->first();
  }

  public function save(SocialMediaRequest $request)
  {
    $fileName = $this->storeImage($request->file('icon'));

    return SocialMedia::create([
      'name'       =>  $request->input('name'),
      'link'       =>  $request->input('link'),
      'icon'       =>  $fileName
    ]);
  }

  public function update(SocialMediaRequest $request, $id)
  {
    $oldFileName = SocialMedia::where('id', $id)->first()->icon;

    if ($request->file('icon')) $fileName = $this->updateImage($request->file('icon'), $oldFileName);
    else $fileName = $oldFileName;

    $res = SocialMedia::where('id', $id)->update([
      'name'       =>  $request->input('name'),
      'link'       =>  $request->input('link'),
      'icon'       =>  $fileName
    ]);

    return $res ? ['message' => "SocialMedia data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, $id)
  {
    $res = SocialMedia::where('id', $id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
