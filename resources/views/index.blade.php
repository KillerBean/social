@extends('layouts.app')

@section('content')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <header><h3>What do you have to say</h3></header>
            <form action="{{ route('post.create') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="button">Create Post</button>
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <header><h3>What other people say:</h3></header>
            @include('includes.posts')
        </div>
    </section>

    @include('includes.modal-edit')

    @section('scripts')
        <script type="text/javascript">
            var token = '{{ csrf_token() }}';
            var urlEdit = '{{route("post-edit")}}';
            var urlLike = '{{route("post-like")}}';
        </script>
    @endsection
@endsection
