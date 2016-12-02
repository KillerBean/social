@foreach($posts as $post)
    <article class="post" data-postid="{{ $post->id }}">
        <p>{{ $post->body }}</p>
        <div class="info">
            Posted By {{ $post->user->name }} on <i>{{ $post->created_at->diffForHumans() }}</i>.
        </div>
        <div class="interaction">
            <a class="like btn btn-success" href="#">
                <i class="fa {{ Auth::user()->likes()->where('post_id', $post->id)->first() ?  Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'fa-check-circle' : 'fa-thumbs-o-up' : 'fa-thumbs-o-up' }}" id="like"></i> Like</a>
            <a class="like btn btn-info" href="#">
                <i class="fa {{ Auth::user()->likes()->where('post_id', $post->id)->first() ?  Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'fa-check-circle' : 'fa-thumbs-o-down' : 'fa-thumbs-o-down' }}" id="dislike"></i> Dislike</a>
            @if($post->user == Auth::User())

            <a class="edit btn btn-warning" href="#">
              <i class="fa fa-pencil"></i> Edit</a>

            <a class="btn btn-danger" href="{{ route('post.delete', ['post_id' => $post->id ]) }}" aria-label="Delete">
              <i class="fa fa-trash-o fa-lg"></i> Delete</a>
            @endif
        </div>
    </article>
@endforeach
