<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
  public function getAll()
  {
    return SubCategory::all();
  }

  public function getOne(Request $request, $id)
  {
    return SubCategory::where('id', $id)->first();
  }

  public function save(SubCategoryRequest $request)
  {
    $fileName = $this->storeImage($request->file('icon'));

    return SubCategory::create([
      'name'                =>  $request->input('name'),
      'link'                =>  $request->input('link'),
      'category_id'         =>  $request->input('category_id'),
      'parent_category'     =>  $request->input('parent_category'),
      'icon'                =>  $fileName,
    ]);
  }

  public function update(SubCategoryRequest $request, $id)
  {
    $oldFileName = SubCategory::where('id', $id)->first()->image;

    if ($request->file('icon')) $fileName = $this->updateImage($request->file('icon'), $oldFileName);
    else $fileName = $oldFileName;

    $res = SubCategory::where('id', $id)->update([
      'name'                =>  $request->input('name'),
      'link'                =>  $request->input('link'),
      'category_id'         =>  $request->input('category_id'),
      'parent_category'     =>  $request->input('parent_category'),
      'icon'                =>  $fileName,
    ]);

    return $res ? ['message' => "SubCategory data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, $id)
  {
    $res = SubCategory::where('id', $id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
