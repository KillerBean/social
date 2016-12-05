<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use View;
use App\Post;

class PagesController extends Controller
{
    public function index(){
        if(Auth::Check()){
            $posts = Post::orderBy('created_at', 'desc')->get();
            return view('index', ['posts' => $posts]);
        }else{
            return view('index2');
        }

    }

    public function bmf(){
        return view('pages.bmf');
    }
}
