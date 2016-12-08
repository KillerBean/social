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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->to('users')->with('message', 'User deleted successfully.');
    }

    public function account(Request $request){
        //Cookie::queue('Vary', 'Accept-Encoding', 15);
        if(file_exists(public_path() . Auth::User()->avatar)){
            $avatarURL = Auth::User()->avatar;
        }else{
            $avatarURL = 'default.jpg';
        }
        return view('account', compact('avatarURL'));
    }

    public function saveAccount(Request $request){
        $this->validate($request, [
            'name' => 'max:120',
            'image_paste' => 'image|max:2048',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'same:password_confirmation|min:8|max:20',
            'password_confirmation' => 'requiredif:password|min:8|max:20',
        ]);

        $user = Auth::user();
        if($request->has('name')){
            $user->name = $request['name'];
            $name = $request['name'];
        }else{
            $name = $user->name;
        }
        if($request->has('image_paste')){
            $image = $request['image_paste'];
            $base64_string = str_replace('data:image/png;base64,', '', $image);
            $avatar = base64_decode($base64_string);

            $filename = $name . '-' . Auth::User()->id . '.png';
            $filename = str_replace(array(' ', "'"), '_', $filename);
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' . $filename));
            $user->avatar = '/uploads/avatars/' . $filename;
        }
        if($request->hasFile('image')){
            $avatar = $request->file('image');
            $filename = $name . '-' . Auth::User()->id . '.' . $request->image->getClientOriginalExtension();
            $filename = str_replace(array(' ', "'"), '_', $filename);
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' . $filename));
            $user->avatar = '/uploads/avatars/' . $filename;
        }

        if($request->has['password']){
            $password = $request['password'];
            $user->password = bcrypt($password);
        }

        $user->update();
        if($request->hasFile('image')){
            return back()->with('success', 'Image Uploaded successfully.')->with('path',$filename);
        }
        return back();
    }
}
