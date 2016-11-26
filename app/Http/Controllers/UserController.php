<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\User;
use Carbon\Carbon;
use Image;
use Cookie;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::paginate(25);

        return view('users.index', compact('users'));
    }
    public function create()
    {
    	return view('users.create');
    }
    public function store(Request $request)
    {
    	return 'Success';
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id){
        return 'Updated';
    }

    public function destroy($id){
        return 'Deleted';
    }

    public function account(Request $request){
        //Cookie::queue('Vary', 'Accept-Encoding', 15);
        return view('account');
    }

    public function saveAccount(Request $request){
        $this->validate($request, [
            'name' => 'required|max:120',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $request['name'];
        if($request->hasFile('image')){
            $avatar = $request->file('image');
            $filename = $request['name'] . '-' . Auth::User()->id . '.' . $request->image->getClientOriginalExtension();
            $filename = str_replace(' ', '_', $filename);
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' . $filename));
            $user->avatar = $filename;
        }

        $user->update();
        if($request->hasFile('image')){
            return back()->with('success', 'Image Uploaded successfully.')->with('path',$filename);
        }
        return back();
    }
}
