<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
        //return view('post.index')->with('posts', $posts);
        //return view('post.index', ['posts'=>$posts]);
    }

    public function addPost(Request $request)
    {
        $validation = [
          'title' => 'required',
          'body' => 'required'
        ];

        $validator = Validator::make(input::all(), $validation);
        if ($validator->fails()){
            return response::json(['errors'=>$validator->getMessageBag()->toArray]);
        }else{
            $post = new Post();
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();
            return response()->json($post);
        }
    }

    public function editPost(request $request){
        $post = Post::find ($request->id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return response()->json($post);
    }

    public function deletePost(Request $request){
        $post = Post::find ($request->id)->delete();
        return response()->json();
    }
}
