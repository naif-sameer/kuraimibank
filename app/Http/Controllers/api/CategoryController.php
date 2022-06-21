<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function getAll()
  {
    return Category::all();
  }

  public function getOne($id)
  {
    return Category::where('id', $id)->first();
  }

  public function save(CategoryRequest $request)
  {
    return Category::create([
      'name'  =>  $request->input('name'),
    ]);
  }

  public function update(CategoryRequest $request, $id)
  {
    $res = Category::where('id', $id)->update([
      'name'  =>  $request->input('name'),
    ]);

    return $res ? ['message' => "Category data updated"] : ['error' => true];
  }

  public function activeToggle(Request $request, $id)
  {
    $res = Category::where('id', $id)->update(['is_active' => $request->is_active]);

    return $res ? ['message' => "active toggle updated"] : ['error' => true];
  }
}
