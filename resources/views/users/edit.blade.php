@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<ul class='list-group'>
				<li class="list-group-item">
					<span>Editing:</span>
				</li>
				<li class='list-group-item'>
					<span>User ID: {{$user->id}}</span><br>
					<span>Name: </span><input class="form-control" type="text" placeholder="{{$user->name}}" required autofocus>
					<span>E-mail: </span><input class="form-control" type="text" placeholder="{{$user->email}}" required>
				</li>
			</ul>
		</div>
	</div>
</div>
@endsection