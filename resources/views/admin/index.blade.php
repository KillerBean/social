@extends('layouts.app')

@section('content')
<div class='row'>
	<div class='col-md-6 col-md-offset-3'>
		<div class="panel panel-default">
                <div class="panel-heading">Show information</div>
                <div class="panel-body">
					<span>User ID: {{ Auth::user()->id }}</span><br>
					<span>Name: {{ Auth::user()->name }}</span><br>
					<span>E-mail: {{ Auth::user()->email }}</span><br>
					<span>Type of user: {{ Auth::user()->role }}</span>
                </div>
            </div>
	</div>
</div>
@endsection