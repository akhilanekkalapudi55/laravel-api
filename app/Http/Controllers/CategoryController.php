<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::get()->toJson(JSON_PRETTY_PRINT);
        return response($category, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->category_code = $request->category_code;
        $category->category_name = $request->category_name;
        $category->category_desc = $request->category_desc;
        $category->save();

        return response()->json([
            "message" => " record created"
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Category::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Category::where('id', $id)->exists()) {
            $category = Category::find($id);
            $category->category_code = is_null($request->category_code) ? $category->category_code : $request->category_code;
            $category->category_name = is_null($request->category_name) ? $category->category_name : $request->category_name;
            $category->category_desc = is_null($request->category_desc) ? $category->category_desc : $request->category_desc;
            $category->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Post not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Category::where('id', $id)->exists()) {
        $category = Category::find($id);
        $category->delete();

        return response()->json([
          "message" => "records deleted"
        ], 202);
        } else {
        return response()->json([
          "message" => "Post not found"
        ], 404);
        }
    }
}
