<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
class PagesController extends Controller
{
    public function index(){
    	/*if(View::exists('pages.index'))
    		return view('pages.index')
    			->with('text', '<b>Laravel</b>')
    			->with('name', 'Nicole')
    			->with(['location' => 'Europe', 'planet' => 'Earth']);
    		//return view('pages.index', ['text' => '<b>Laravel</b>']);*/
    	//else
    	//	return 'No view available!';
        return view('welcome');
    }

    public function profile(){
        return view('pages.profile');
    }

    public function settings(){
        return view('pages.settings');
    }

    public function blade(){
        $gender = 'male';
        $text = 'Hello there!';
        return view('blade.bladetest', compact('gender', 'text'));
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
