<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function getAll()
  {
    return Category::all();
  }

  public function getOne(Request $request)
  {
    return Category::where('id', $request->id)->first();
  }

  public function save(Request $request)
  {
    // TODO add file upload trait
    return Category::create([
      'name'  =>  $request->input('name'),
    ]);
  }

  public function update(Request $request)
  {
    // TODO add file  upload trait
    $res = Category::where('id', $request->id)->update([
      'name'  =>  $request->input('name'),
    ]);

    return $res ? ['message' => "Category data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request)
  {
    $res = Category::where('id', $request->id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
