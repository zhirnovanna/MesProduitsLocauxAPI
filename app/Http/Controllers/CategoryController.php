<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Category management
 *
 * APIs for managing categories and get categories info
 */
class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     * Apply CategoryPolicy
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->authorizeResource(Category::class, 'categories');
    }*/


    /**
     * Return a json listing of the categories.
     *
     * @queryParam offset integer Point in the array where to start the set of returned data. Default 0. If specified limit must be specified too.
     * @queryParam limit integer Number of categories to return. Default all. If specified offset must be specified too.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if((!empty(request()->offset) || request()->offset == 0) && !empty(request()->limit) 
        && intval(request()->offset) >= 0 && intval(request()->limit) >= 0) {

            return Category::offset(intval(request()->offset))
            ->limit(intval(request()->limit))
            ->get();

        } else {
            return Category::all();
        }
    }

    /**
     * Store a newly created category in database storage.
     * Return the category info as json.
     * 
     * @bodyParam name string required Name of the category, must be unique and between 3 and 45 characters.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:45|unique:categories,name',
            'icon' => 'max:45'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 500);
        }

        $category = Category::create($request->all());

        return response()->json($category, 201);
    }

    /**
     * Return a json of the category info corresponding to specified id.
     *
     * @urlParam category integer required The ID of the category.
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Update the category specified by id in database storage.
     * Return a json of the category info.
     * 
     * @bodyParam name string Name of the category, must be unique and between 3 and 45 characters.
     *
     * @urlParam category integer required The ID of the category.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'min:3|max:45|unique:categories,name,' . $category->id,
            'icon' => 'max:45'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 500);
        }

        $category->update($request->all());

        return response()->json($category, 200);
    }

    /**
     * Remove the category specified by id from database storage.
     * Return json with removed category id in 'id' key and action performed in 'action' key.
     *
     * @urlParam category integer required The ID of the category.
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $categoryId = $category->id;
        $category->delete();

        return response()->json(['action' => 'deleted region', 'id' => $categoryId], 200);
    }
    
    /**
     * Return the total number of entries for categories in database
     *
     * @return \Illuminate\Http\Response
     */
    public function total()
    {
        return Category::count();
    }
}
