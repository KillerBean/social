@extends('layouts.app')

@section('content')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
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
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people say...</h3></header>
            @include('includes.posts')
        </div>
    </section>

    @include('includes.modal-edit')

    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
        var url = '{{route("post-edit")}}';
    </script>
@endsection
