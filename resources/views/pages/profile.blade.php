@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                    <span>User ID: {{Auth::user()->id}}</span><br>
                    <span>Name: {{Auth::user()->name}}</span><br>
                    <span>Name: {{Auth::user()->email}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection