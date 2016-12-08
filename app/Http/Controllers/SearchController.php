<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class SearchController extends Controller
{
    public function search(Request $request, $query = null){
        if($query == null)
            return redirect()->back();

        $search = User::where('name', 'like', '%'.$query.'%')->orwhere('email', 'like', '%'.$query.'%')->paginate(10);

        return view('search', [
            'results' => $search,
            'query' => $query
        ]);
    }
}
