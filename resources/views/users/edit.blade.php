@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<ul class='list-group'>
			<li class="list-group-item">
				<span>Editing:</span>
			</li>
			<li class='list-group-item'>
				<span>User ID: {{$user->id}}</span><br>
				<span>Name: {{$user->name}}</span><br>
				<span>Name: {{$user->email}}</span>
			</li>
		</ul>
	</div>
</div>
@endsection