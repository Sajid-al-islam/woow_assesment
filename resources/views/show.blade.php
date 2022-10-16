@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @auth
            <div class="d-flex justify-content-end">
                <a class="btn btn-primary" href="{{ route('post.edit' ,$post->id) }}">Edit</a>
            </div>    
            @endauth
              
            <div class="card mt-3">
                <div class="card-body">
                    <p><b>{{ $post->title }}</b></p>
                    <p>
                        {{ $post->body }}
                    </p>
                    <hr />
                    <h4>Display Comments</h4>

                    @include('partials._comment_replies', ['comments' => $post->comments->where('status', 1), 'post_id' => $post->id])
                    
                    <hr />
                    <h4>Add comment</h4>
                    <form method="post" action="{{ route('comment.add') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="comment_name" class="form-control" placeholder="Name"/>
                        </div>
                        <div class="form-group">
                            <textarea type="text" name="comment_body" class="form-control" placeholder="Comment"></textarea>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Add Comment" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
