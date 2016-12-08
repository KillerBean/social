@extends('layouts.app')

@section('content')
    @include('includes.message-block')
    <div class="container">
        <div class="row">
            @if($results->count())
                <div class="col-md-8 col-md-offset-2">
                <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                @foreach($results as $user)

                        <div class="panel panel-warning">
                            <div class="panel-body">
                                <img src="{{URL::To($user->avatar)}}" width="100px" height="100px" alt="User Avatar" class="img-responsive pull-left">
                                <h2 class="pull-left" style="margin-left: 20px;" >{{$user->name}}</h2>
                                @if($user != Auth::User())
                                    <a href="{{URL::To('/profile',$user->id)}}" class="pull-right btn btn-primary">
                                        <i class="fa fa-user"></i> View Profile
                                    </a>
                                @endif
                            </div>
                        </div>
                @endforeach
                {{ $results->links() }}
                </div>
            @else
                <h2 class="text-center">No Search results!</h2>
            @endif
        </div>
    </div>
    @section('scripts')
        <script type="text/javascript">
            ;(function ($) {

            })(window.jQuery);
        </script>
    @endsection
@endsection
