<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Task;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function index()
    {
    	$users = User::paginate(10);
        
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

    public function update($id){
        return 'Updated';
    }

    public function destroy($id){
        return 'Deleted';
    }
}
