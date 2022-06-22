<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
  public function getAll()
  {
    return News::all();
  }

  public function getOne(Request $request, $id)
  {
    return News::where('id', $id)->first();
  }

  public function save(NewsRequest $request)
  {
    $fileName = $this->storeImage($request->file('image'));

    return News::create([
      'title'               =>  $request->input('title'),
      'description'         =>  $request->input('description'),
      'image'               =>  $fileName,
    ]);
  }

  public function update(NewsRequest $request, $id)
  {
    $oldFileName = News::where('id', $id)->first()->image;

    if ($request->file('image')) $fileName = $this->updateImage($request->file('image'), $oldFileName);
    else $fileName = $oldFileName;

    $res = News::where('id', $id)->update([
      'title'               =>  $request->input('title'),
      'description'         =>  $request->input('description'),
      'image'               =>  $fileName,
    ]);

    return $res ? ['message' => "News data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, $id)
  {
    $res = News::where('id', $id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
