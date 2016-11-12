@extends('layouts.app')

@section('content')
<div class='row'>
	<div class='col-md-6 col-md-offset-3'>
		<h3>{{ $users->total() }} total users</h3>

		<b>In this page ({{ $users->count() }} users)</b>

		<ul class='list-group'>
			@foreach($users as $user)
				<li class='list-group-item' style='margin-top: 20px;'>
					<span style='padding: 5px;border: 1px solid #d3e0e9;margin-right: 5px;'>USER ID: {{$user->id}}</span>
					<span>User Name: {{ $user->name }}</span>
					<span class='pull-right clearfix'>Joined({{ $user->created_at->diffForHumans() }})
					<!--<button class="btn btn-xs btn-primary">Follow</button>-->
					<a href="{{ URL::route('users.index') }}/{{ $user->id }}" class="btn btn-primary btn-xs" role="button" aria-pressed="true">Information</a>
					</span>
				</li>
			@endforeach

			{{ $users->links() }}
		</ul>
	</div>
</div>
@endsection