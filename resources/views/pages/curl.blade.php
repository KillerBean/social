@extends('layouts.app')

@section('content')
<div class='row'>
	<div>
		<ul class='list-group'>
			@foreach($fields as $field => $value)
				<li class='list-group-item'>
					<span>{{ $field }} <===> {{ $value }}</span>
				</li>
			@endforeach
		</ul>
	</div>
	
</div>
@endsection
