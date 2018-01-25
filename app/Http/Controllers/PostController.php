<?php

namespace App\Http\Controllers;

use Image;
use App\Like;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function dashboard(){
        $posts = Post::orderBy('created_at', 'desc')->get()->where('user_id', Auth::User()->id);
        return view('dashboard', ['posts' => $posts]);
    }

    public function createPost(Request $request){
        $this->validate($request, [
            'body' => 'required|max:1000',
            'has_image' => 'required|boolean'
        ]);
        $post = new Post();
        $post->body = $request['body'];
        if($request['has_image'] == 1){
            $post->has_image = true;
            $image_id = rand();
            while(file_exists(public_path() . '/uploads/images/' . Auth::User()->id . '/' . $image_id . '-' . Auth::User()->id . '.png')){
                $image_id = rand();
            }
            if(!file_exists(public_path() . '/uploads/images/' . Auth::User()->id)){
                mkdir(public_path() . '/uploads/images/' . Auth::User()->id, 0755, true);
            }
            rename(public_path() . '/uploads/tmp/images/' . 'new_post' . '-' . Auth::User()->id . '.png', public_path() . '/uploads/images/' . Auth::User()->id . '/' . $image_id . '-' . Auth::User()->id . '.png');
            $post->image_path = '/uploads/images/' . Auth::User()->id . '/' . $image_id . '-' . Auth::User()->id . '.png';
        }else{
            if(file_exists(public_path() . '/uploads/tmp/images/' . 'new_post' . '-' . Auth::User()->id . '.png')){
                unlink(public_path() . '/uploads/tmp/images/' . 'new_post' . '-' . Auth::User()->id . '.png');
            }
            $post->has_image = false;
        }
        $message = "There was an error try again later :'(";

        if($request->user()->posts()->save($post)){
            $message = "Post successfully created!";
        }
        return redirect()->route('dashboard')->with(['message' => $message]);
    }

    public function uploadPostImage(Request $request){
        $this->validate($request, [
            'image_paste' => 'image|max:2048',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        if(file_exists(public_path() . '/uploads/tmp/images/' . 'new_post' . '-' . Auth::User()->id . '.png')){
            unlink(public_path() . '/uploads/tmp/images/' . 'new_post' . '-' . Auth::User()->id . '.png');
        }
        if($request->has('image_paste')){
            $image_paste = $request['image_paste'];
            $base64_string = str_replace('data:image/png;base64', '', $image_paste);
            $image = base64_decode($base64_string);

            $filename = 'new_post' . '-' . Auth::User()->id . '.png';
            Image::make($image)->save(public_path('/uploads/tmp/images/' . $filename));

        }
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'new_post' . '-' . Auth::User()->id . '.png';
            Image::make($image)->save(public_path('/uploads/tmp/images/' . $filename));
        }
    }

    public function likePost(Request $request){
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if(!$post){
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if($like){
            $already_like = $like->like;
            $update = true;
            if($already_like == $is_like){
                $like->delete();
                return null;
            }
        }else{
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if($update){
            $like->update();
        }else{
            $like->save();
        }
        return null;
    }

    public function deletePost($post_id){
        $post = Post::where('id', $post_id)->first();
        if (Auth::User() != $post->user){
            return redirect()->back()->with(['errors' => 'Not Logged with the right user to delete this Post']);
        }
        if($post->has_image){
            unlink(public_path() . $post->image_path);
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Post successfully deleted.']);
    }

    public function editPost(Request $request){
        $this->validate($request, [
            'body' => 'required'
        ]);
        if (Auth::User() != $post->user){
            return redirect()->back();
        }
        $post = Post::find($request['postId']);
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body' => $post->body], 200);
    }
}
