<form method="POST" action="/users">

	<input type="text" name="name">
	<input type="email" name="email">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="password" name="password">
	<input type="submit" value="Create">
	{!! csrf_field() !!}
</form>