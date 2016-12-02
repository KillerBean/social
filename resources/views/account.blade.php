@extends('layouts.app')

@section('title')
    Account
@endsection

@section('heading')

@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                <div class="panel-heading"><header><h3>Your Account</h3></header></div>
                <div class="panel-body">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <img src="{{ URL::To(Auth::User()->avatar)}}" class="img-responsive img-circle" height="150px" width="150px">
                    </div>

                        @include('includes.message-block')
                        <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" name="name" class="form-control" placeholder="{{ Auth::User()->name }}" id="name">
                            </div>

                            <img class="target active" name='image_paste'>
                            <div class="form-group">
                                <label for="image">Image ( jpg | png | svg | gif )</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Account</button>
                            {{ csrf_field() }}
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

<script>
// http://stackoverflow.com/questions/1933969/sound-effects-in-javascript-html5
</script>
<script src="{{ URL::To('/js/pasteimage.js') }}"></script>
<script type="text/javascript">
    var token = '{{ csrf_token() }}';
    var urlAccountSave = '{{route("account.save")}}';
</script>
@endsection
