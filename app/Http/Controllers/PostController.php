<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all post
        $posts = Post::get()->toJson(JSON_PRETTY_PRINT);
        return response($posts, 200);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create
        // $v = Validator::make($request->all(), [
        //     'title' => 'required|unique:posts|max:255',
        //     'slug'  => 'required',
        // ]);

        // if ($v)
        // {
            $post = new Post;
            $post->title = $request->title;
            $post->slug = $request->slug;
            // $post->likes = $request->likes;
            $post->content = $request->content;
            $post->save();

            return response()->json([
                "message" => " record created"
            ], 201);
        // }   
        // }else{
        //     return redirect()->back()->withErrors($v->errors());
        // }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\ResponsePost
     */
    public function show($id)
    {
        //show
        return Post::find($id);
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
        //update
        if (Post::where('id', $id)->exists()) {
        $post = Post::find($id);
        $post->title = is_null($request->title) ? $post->title : $request->title;
        $post->slug = is_null($request->slug) ? $post->slug : $request->slug;
        $post->content = is_null($request->content) ? $post->content : $request->content;
        $post->save();

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
    public function delete($id)
    {
        //delete
        if(Post::where('id', $id)->exists()) {
        $post = Post::find($id);
        $post->delete();

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
