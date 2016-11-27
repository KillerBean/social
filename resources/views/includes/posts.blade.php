@foreach($posts as $post)
    <article class="post" data-postid="{{ $post->id }}">
        <p>{{ $post->body }}</p>
        <div class="info">
            Posted By {{ $post->user->name }} on <i>{{ $post->created_at->diffForHumans() }}</i>.
        </div>
        <div class="interaction">
            <a class="btn btn-success" href="#">
                <i class="fa fa-thumbs-o-up"></i> Like</a>
            <a class="btn btn-info" href="#">
                <i class="fa fa-thumbs-o-down"></i> Dislike</a>
            @if($post->user == Auth::User())

            <a class="edit btn btn-warning" href="#">
              <i class="fa fa-pencil"></i> Edit</a>

            <a class="btn btn-danger" href="{{ route('post.delete', ['post_id' => $post->id ]) }}" aria-label="Delete">
              <i class="fa fa-trash-o fa-lg"></i> Delete</a>
            @endif
        </div>
    </article>
@endforeach
