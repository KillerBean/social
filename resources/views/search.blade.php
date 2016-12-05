@extends('layouts.app')

@section('content')
    @include('includes.message-block')
    <div class="container">
        @if($results->count())
            <div class="col-md-8 col-md-offset-2">
            <p> The Search results for your query <b> {{ $query }} </b> are :</p>
            @foreach($results as $user)

                    <div class="panel panel-alert">
                        <div class="panel-body">
                            <img src="{{URL::To($user->avatar)}}" width="100px" height="100px" alt="User Avatar" class="img-responsive pull-left">
                            <h2 class="pull-left" style="margin-left: 20px;" >{{$user->name}}</h2>
                            <a href="{{URL::To('/profile',$user->id)}}" type="button" class="pull-right btn btn-primary">
                                <i class="fa fa-user"></i> View Profile
                            </a>
                        </div>
                    </div>

            @endforeach
            </div>
        @else
            <h2 class="text-center">No Search results!</h2>
        @endif
    </div>
    <!-- <div class="container">
        @if($results->count())
            <p> The Search results for your query <b> {{ $query }} </b> are :</p>
        <h2>Sample User details</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div> -->
    @section('scripts')
        <script type="text/javascript">
            ;(function ($) {

            })(window.jQuery);
        </script>
    @endsection
@endsection
