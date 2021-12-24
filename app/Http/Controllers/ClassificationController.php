<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classification;

class ClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classification = Classification::get()->toJson(JSON_PRETTY_PRINT);
        return response($classification, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classification = new Classification;
        $classification->classification_code = $request->classification_code;
        $classification->classification_name = $request->classification_name;
        $classification->classification_desc = $request->classification_desc;
        $classification->save();

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
        return Classification::find($id);
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
        if (Classification::where('id', $id)->exists()) {
            $classification = Classification::find($id);
            $classification->classification_code = is_null($request->classification_code) ? $classification->category_code : $request->classification_code;
            $classification->classification_name = is_null($request->classifiction_name) ? $classification->category_name : $request->classification_name;
            $classification->category_desc = is_null($request->classification_desc) ? $classification->classification_desc : $request->classification_desc;
            $classification->save();

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
        if(Classification::where('id', $id)->exists()) {
        $classification = Classification::find($id);
        $classification->delete();

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
