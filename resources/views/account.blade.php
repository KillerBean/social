@extends('layouts.app')

@section('title')
    Account
@endsection

@section('content')
    <section class="row new-post">
        <div class="col-md-4 col-md-offset-3">

                <img src="  @if(file_exists(public_path().'/uploads/avatars/'.Auth::User()->avatar))
                                {{ URL::To('/uploads/avatars') }}/{{Auth::User()->avatar}}
                            @else
                                    {{ URL::To('/uploads/avatars/default.jpg') }}
                            @endif
                                " class="img-responsive profile" height="150px" width="150px">

        </div>
        <div class="col-md-6 col-md-offset-3">

            <header><h3>Your Account</h3></header>
            @include('includes.message-block')
            <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" name="name" class="form-control" value="{{ Auth::User()->name }}" id="name">
                </div>
                <div class="form-group">
                    <label for="image">Image ( jpg | png | svg | gif )</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Save Account</button>
                {{ csrf_field() }}
            </form>
        </div>
    </section>
@endsection
