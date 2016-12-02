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

    public function profile(){
        return view('pages.profile');
    }

    public function settings(){
        return view('pages.settings');
    }

    public function bmf(){
        // $url = 'http://finance.google.com/finance/info?q=BVMF,BBDC4';
        // $curl = curl_init($url);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // $obj = curl_exec($curl);
        // $replaces = array("/", "[", "]");
        // $obj = str_replace($replaces, '', $obj);
        // $fields = json_decode($obj, true);
        // $fields = (object)$fields;

        // return view('pages.curl', compact('fields'));
        return view('pages.bmf');
    }
}
