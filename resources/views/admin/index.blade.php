@extends('layouts.app')

@section('content')
<div class='row'>
	<div class='col-md-6 col-md-offset-3'>
		<div class="panel panel-default">
            <div class="panel-heading">Admin Panel</div>
            <div class="panel-body">
				<a href="{{URL::To('/users/')}}" class="btn btn-primary">List of users</a>
				<a href="{{URL::To('/admin/reports')}}" class="btn btn-primary">Reports of the site</a>
			</div>
        </div>
	</div>
</div>
@endsection
