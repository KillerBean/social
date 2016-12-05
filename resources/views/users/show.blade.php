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
					<span>Name: {{$user->email}}</span>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection
