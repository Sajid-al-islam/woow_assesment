 @foreach($comments as $comment)
    <div class="display-comment">
        <div class="card mb-3">
            <div class="card-body">
                <strong class="card-title">{{ $comment->user->name }}</strong>
                <p class="card-text">{{ $comment->body }}</p>
                @auth
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{ route('comment.update_status' ,$comment->id) }}">Hide</a>
                </div>     
                @endauth
                 
            </div>
          </div>
        
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment_body" class="form-control my-2" placeholder="name"/>
                <input type="text" name="comment_name" class="form-control my-2" placeholder="comment"/>
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('partials._comment_replies', ['comments' => $comment->replies->where('status', 1)])
    </div>
@endforeach