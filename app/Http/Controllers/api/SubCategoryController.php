<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
  public function getAll()
  {
    return SubCategory::all();
  }

  public function getOne(Request $request)
  {
    return SubCategory::where('id', $request->id)->first();
  }

  public function save(Request $request)
  {
    // TODO add file upload trait
    return SubCategory::create([
      'name'                =>  $request->input('name'),
      'link'                =>  $request->input('link'),
      'icon'                =>  $request->input('icon'),
      'category_id'         =>  $request->input('category_id'),
      'parent_category'     =>  $request->input('parent_category'),
    ]);
  }

  public function update(Request $request)
  {
    // TODO add file  upload trait
    $res = SubCategory::where('id', $request->id)->update([
      'name'                =>  $request->input('name'),
      'link'                =>  $request->input('link'),
      'icon'                =>  $request->input('icon'),
      'category_id'         =>  $request->input('category_id'),
      'parent_category'     =>  $request->input('parent_category'),
    ]);

    return $res ? ['message' => "SubCategory data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request)
  {
    $res = SubCategory::where('id', $request->id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
