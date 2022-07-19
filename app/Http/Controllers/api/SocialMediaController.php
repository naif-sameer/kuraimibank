<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialMediaRequest;
use App\Http\Resources\SocialMediaResource;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
  public function index(Request $request)
  {
    return SocialMediaResource::collection(SocialMedia::all());
  }

  public function show(SocialMedia $socialMedia)
  {
    return new SocialMediaResource($socialMedia);
  }

  public function store(SocialMediaRequest $request)
  {
    $fileName = $this->storeImage($request->file('icon'));

    return SocialMedia::create([
      'title'      =>  $request->title,
      'link'       =>  $request->link,
      'icon'       =>  $fileName
    ]);
  }

  public function update(SocialMediaRequest $request, SocialMedia $socialMedia)
  {
    $oldFileName = $socialMedia->icon;

    if ($request->file('icon')) $fileName = $this->updateImage($request->file('icon'), $oldFileName);
    else $fileName = $oldFileName;

    $res = $socialMedia->update([
      'title'      =>  $request->title,
      'link'       =>  $request->link,
      'icon'       =>  $fileName
    ]);

    return $res ? ['message' => "SocialMedia data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, SocialMedia $socialMedia)
  {
    $res = $socialMedia->update($request->only(['is_active']));

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
