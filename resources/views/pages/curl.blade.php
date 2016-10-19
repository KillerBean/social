@extends('layouts.app')

@section('content')
<div class='row'>
	<div>
		<ul class='list-group'>
			@foreach($fields as $field)
				<li class='list-group-item' style='margin-top: 20px;'>
					<span>{{ $field }}</span>
				</li>
			@endforeach
		</ul>
	</div>
	
</div>
@endsection
