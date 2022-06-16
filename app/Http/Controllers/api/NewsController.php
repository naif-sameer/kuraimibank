<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
  public function getAll()
  {
    return News::all();
  }

  public function getOne(Request $request)
  {
    return News::where('id', $request->id)->first();
  }

  public function save(Request $request)
  {
    // TODO add file upload trait
    return News::create([
      'title'               =>  $request->input('title'),
      'description'         =>  $request->input('description'),
      'image'               =>  $request->input('image'),
    ]);
  }

  public function update(Request $request)
  {
    // TODO add file  upload trait
    $res = News::where('id', $request->id)->update([
      'title'               =>  $request->input('title'),
      'description'         =>  $request->input('description'),
      'image'               =>  $request->input('image'),
    ]);

    return $res ? ['message' => "News data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request)
  {
    $res = News::where('id', $request->id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
