<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class FriendController extends Controller
{
    public function index(){
        $friendRequests = Auth::User()->getFriendRequests();
        $senders = $friendRequests->pluck('sender_id')->all();
        $requesters = User::all()->where('id', '!=', Auth::user()->id)->whereIn('id', $senders);
        $friends = Auth::User()->getFriends();
        return view('friends.index')->with('friendRequests', $friendRequests)->with('requesters', $requesters)->with('friends', $friends);
    }

    public function SendFriendRequest($id){
        $user = Auth::User();
        $recipient = User::findOrFail($id);
        $user->befriend($recipient);
        return redirect()->back()->with("Status", "Request has been send.");
    }

    public function AcceptFriendRequest($id){
        $user = Auth::User();
        $recipient = User::findOrFail($id);
        $user->acceptFriendRequest($recipient);
        return redirect()->back();
    }

    public function UnfriendOrCancelRequest($id){
        $user = Auth::User();
        $recipient = User::findOrFail($id);
        $user->unfriend($recipient);
        return redirect()->back();
    }
}
