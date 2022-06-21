<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
  public function getAll()
  {
    return Page::all();
  }

  public function getOne(Request $request, $table_key)
  {
    return Page::where('table_key', $table_key)->first();
  }

  public function save(Request $request)
  {
    $request->validate([
      'table_key' => 'required|unique:pages',
      'title' => 'required',
      'sub_title' => 'required',
      'description' => 'required',
    ]);

    return Page::create([
      'table_key'         =>  "{$request->input('table_key')}",
      'title'             =>  $request->input('title'),
      'sub_title'         =>  $request->input('sub_title'),
      'description'       =>  $request->input('description'),
    ]);
  }

  public function update(Request $request, $table_key)
  {
    $request->validate([
      'title' => 'required',
      'sub_title' => 'required',
      'description' => 'required',
    ]);

    $res = Page::where('table_key', $table_key)
      ->update([
        'title'             =>  $request->input('title'),
        'sub_title'         =>  $request->input('sub_title'),
        'description'       =>  $request->input('description'),
      ]);

    return $res ? ['message' => "Page data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, $table_key)
  {
    $res = Page::where('table_key', $table_key)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
