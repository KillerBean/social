@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading"><header><h3>Edit User</h3></header></div>
				<div class="panel-body">
					<div class="show-edit-image col-sm-12 col-md-12 col-lg-12">
						<img src="{{ URL::To(Auth::User()->avatar)}}" class="edit-photo img-responsive img-circle" height="150px" width="150px">
					</div>
						@include('includes.message-block')
						<form action="{{ route('account.save') }}" id="update-account" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="name">User Name</label>
								<input type="text" name="name" class="form-control" placeholder="{{ Auth::User()->name }}" id="name">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control" placeholder="Change Your Password" id="password">
							</div>
							<div class="form-group">
								<label for="password-confirm">Password Confirm</label>
								<input type="password" name="password-confirm" class="form-control" placeholder="Confirm Your Password" id="password-confirm">
							</div>
							@include('includes.upload-photo')
							<button type="submit" class="btn btn-primary">Save Account</button>
							{{ csrf_field() }}
						</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
