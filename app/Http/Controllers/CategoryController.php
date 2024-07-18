<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    const VIEW_CATEGORY = 'admin.categories.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $rootCategory = Category::whereNull('parent_id');

        $categories = $rootCategory->with('children')->get();

        // dd($allCategory->toArray());

        return view(self::VIEW_CATEGORY . __FUNCTION__ , compact('categories') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $rootCategory = Category::whereNull('parent_id');

        $categories = $rootCategory->with('children')->get();

        return view(self::VIEW_CATEGORY . __FUNCTION__ , compact('categories') );
    }


    public function store(Request $request)
    {
        $data = $request->toArray();
        // dd($data);
        $category = Category::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $rootCategory = Category::whereNull('parent_id');

        $categories = $rootCategory->with('children')->get();


        $parentCatelogy = Category::find($category->parent_id);

        return view(self::VIEW_CATEGORY . __FUNCTION__ , compact('category','categories','parentCatelogy') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $data = $request->all();
        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success','Thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
