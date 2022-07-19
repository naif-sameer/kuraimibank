<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
  public function index(Request $request)
  {
    return NewsResource::collection(News::paginate($request->resultsPerPage ?? 10));
  }

  public function show(News $news)
  {
    return new NewsResource($news);
  }

  public function store(NewsRequest $request)
  {
    $fileName = $this->storeImage($request->file('image'));

    return News::create([
      'title'               =>  $request->title,
      'description'         =>  $request->description,
      'image'               =>  $fileName,
    ]);
  }

  public function update(NewsRequest $request, News $news)
  {
    $oldFileName = $news->image;

    if ($request->file('image')) $fileName = $this->updateImage($request->file('image'), $oldFileName);
    else $fileName = $oldFileName;

    $res = $news->update([
      'title'               =>  $request->title,
      'description'         =>  $request->description,
      'image'               =>  $fileName,
    ]);

    return $res ? ['message' => "News data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, News $news)
  {
    $res = $news->update($request->only(['is_active']));

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
