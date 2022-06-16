<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\page;
use Illuminate\Http\Request;

class PageController extends Controller
{
  public function getAll()
  {
    return page::all();
  }

  public function getOne(Request $request)
  {
    return page::where('id', $request->id)->first();
  }

  public function save(Request $request)
  {
    // TODO add file upload trait
    return page::create([
      'title'             =>  $request->input('title'),
      'sub_title'         =>  $request->input('sub_title'),
      'description'       =>  $request->input('description'),
    ]);
  }

  public function update(Request $request)
  {
    // TODO add file  upload trait
    $res = page::where('id', $request->id)
      ->update([
        'title'             =>  $request->input('title'),
        'sub_title'         =>  $request->input('sub_title'),
        'description'       =>  $request->input('description'),
      ]);

    return $res ? ['message' => "page data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request)
  {
    $res = page::where('id', $request->id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
