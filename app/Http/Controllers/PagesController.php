<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
class PagesController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function profile(){
        return view('pages.profile');
    }

    public function settings(){
        return view('pages.settings');
    }

    public function curl(){
        $url = 'http://finance.google.com/finance/info?q=BVMF,BBDC4';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $obj = curl_exec($curl);
        $replaces = array("/", "[", "]");
        $obj = str_replace($replaces, '', $obj);
        $fields = json_decode($obj, true);
        $fields = (object)$fields;
        
        return view('pages.curl', compact('fields'));
    }
}
