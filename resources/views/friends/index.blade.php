@extends('layouts.app')

@section('content')
@if(Auth::User()->getFriendRequests()->Count() > 0)
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">
        <p> These people have sent friend requests to you:</p>
        </div>
        <div class="panel-body">
            @foreach($friendRequests as $fr)
                <div class="panel panel-warning">
                    <div class="panel-body">
                        <img src="{{URL::To($requesters->where('id', $fr->sender_id)->first()->avatar)}}" width="100px" height="100px" alt="User Avatar" class="img-responsive pull-left">
                        <h2 class="pull-left" style="margin-left: 20px;" >{{$requesters->where('id', $fr->sender_id)->first()->name}}</h2>
                        <a href="{{URL::To('/acceptfriend',$fr->sender_id)}}" class="pull-right btn btn-primary">
                            <i class="fa fa-check"></i> Accept Request
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif

@if(Auth::User()->getFriendsCount() > 0)
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">
        <p> These people have sent friend requests to you:</p>
        </div>
        <div class="panel-body">
            @foreach($friends as $friend)
                <div class="panel panel-info">
                    <div class="panel-body">
                        <img src="{{URL::To($friend->avatar)}}" width="100px" height="100px" alt="User Avatar" class="img-responsive pull-left">
                        <h2 class="pull-left" style="margin-left: 20px;" >{{$friend->name}}</h2>
                        <a href="{{URL::To('/profile',$friend->id)}}" class="pull-right btn btn-primary">
                            <i class="fa fa-user-o"></i> View profile
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection
