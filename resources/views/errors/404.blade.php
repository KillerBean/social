@extends('layouts.errors')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h1 class="logo">ERROR 404</h1></div>
                        <div class="panel-body">
                            <span>Error occurred! - Page not Found</span><br><br>
                            <a href="{{URL::to('')}}" class="btn btn-primary">Back to home.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection