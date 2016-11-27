<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function dashboard(){
        $posts = Post::orderBy('created_at', 'desc')->get()->where('user_id', Auth::User()->id);
        return view('dashboard', ['posts' => $posts]);
    }

    public function createPost(Request $request){
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        $post = new Post();
        $post->body = $request['body'];
        $message = "There was an error try again later :'(";
        if($request->user()->posts()->save($post)){
            $message = "Post successfully created!";
        }
        return redirect()->route('dashboard')->with(['message' => $message]);
    }

    public function deletePost($post_id){
        $post = Post::where('id', $post_id)->first();
        if (Auth::User() != $post->user){
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Successfully deleted.']);
    }

    public function editPost(Request $request){
        $this->validate($request, [
            'body' => 'required'
        ]);
        $post = Post::find($request['postId']);
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body' => $post->body], 200);
    }
}
