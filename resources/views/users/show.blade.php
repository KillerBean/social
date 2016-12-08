@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
                <div class="panel-heading">Profile information</div>
                <div class="panel-body">
					<span>User ID: {{$user->id}}</span><br>
					<span>Name: {{$user->name}}</span><br>
					<span>E-mail: {{$user->email}}</span>
					@if(!$user->isFriendWith(Auth::User()) && !$user->hasFriendRequestFrom(Auth::User()))
						<a href="{{URL::To('/befriend',$user->id)}}" class="pull-right btn btn-primary">
							<i class="fa fa-user"></i> Send Friend Request
						</a>
					@elseif($user->isFriendWith(Auth::User()))
						<p class="pull-right">You are already friends.</p>
					@else
						<a href="{{URL::To('/unfriend',$user->id)}}" id="friend-request" class="pull-right btn btn-success">
							<i class="fa fa-user-o"></i> Friend request has been sent
						</a>
					@endif
                </div>
            </div>
        </div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

$('#friend-request').hover(function(){
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
		$(this).html('<i class="fa fa-times"></i> Cancel friend request');
    }, function(){
        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
		$(this).append('<i class="fa fa-times"></i>');
		$(this).html('<i class="fa fa-user-o"></i> Friend request has been sent');
    }
);

</script>
@endsection
