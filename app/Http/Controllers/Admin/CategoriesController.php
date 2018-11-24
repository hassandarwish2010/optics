<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\Admin\CategoryRequest;

class CategoriesController extends Controller
{
  /**
   * Show all categories
   *
   * @return response
   */
  public function index(Category $category) {
     $categories = $category->orderBy('id', 'asc')->get();

     return view('admin.categories.index', compact('categories'));
  }

  /**
   * Create new category
   *
   * @return response
   */
  public function create() {
    return view('admin.categories.create');
  }

  /**
   * Store new category
   *
   * @return response
   */
  public function store(CategoryRequest $request) {
    $category = Category::create($request->all());
    $category->save();

    return redirect()->back()->with(['success' => 'Category inserted successfully']);
  }

  /**
   * edit existing category
   *
   * @return response
   */
  public function edit($id) {
    $category = Category::where('id', $id)->first();

    if (! $category) {
      return redirect()->back()->with(['error' => 'Data Not Found']);
    }
      return view('admin.categories.edit', compact('category'));
  }

  /**
   * update existing category
   *
   * @return response
   */
  public function update($id, CategoryRequest $request) {
    $category = Category::where(['id' => $id])->first();

    if (! $category) {
      return redirect()->back()->with(['error' => 'Sorry, An error occurs']);
    }

    $category = $category->fill($request->all());
    $category->save();

   return redirect()->back()->with(['success' => 'Category updated successfully']);
  }

  /**
   * Delete category by the given id
   *
   * @return message
   */
  public function destroy($id) {
    $category = Category::where(['id' => $id])->first();

    if (! $category) {
      return redirect()->back()->with(['error' => 'Data Not Found']);
    }
    Category::destroy($id);
    return redirect()->back()->with(['success' => 'Category deleted successfully']);
  }
}
