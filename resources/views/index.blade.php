@extends('layouts.app')
<style>
    .btn .btn-primary {
        background-color: rgb(96 141 96) !important;
        border: none;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            @auth
            <div class="d-flex justify-content-end">
                <a class="btn btn-primary" href="{{ route('post.create') }}">Create Post</a>
            </div>      
            @endauth
              
            @foreach($posts as $post)
            
            <div class="card my-3">
                <div class="card-body">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  {{-- @dd($post->user) --}}
                  <p class="card-text">{{ \Illuminate\Support\Str::limit($post->body, 150, $end='...') }}</p>
                  <p class="card-text">Created By <b>{{ $post->user->name }}</b> {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p> 
                  
                  <div class="d-flex justify-content-end">
                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Read More</a>
                  </div>
                </div>
              </div>
            @endforeach
            <div class="d-flex justify-content-end">
                {!! $posts->links() !!}
            </div>

            {{-- <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Show Post</a>
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table> --}}
        </div>
    </div>
</div>
@endsection
