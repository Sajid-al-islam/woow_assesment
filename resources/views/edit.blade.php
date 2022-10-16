@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="d-flex justify-content-end">
                <a class="btn btn-primary" href="{{ route('post.create') }}">Edit</a>
            </div>   --}}
            <div class="card mt-3">
                <div class="card-body">
                    
                    <form method="POST" action="{{ route('post.update', $post->id) }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" value="{{ $post->title }}" />
                        </div>
                        <div class="form-group">
                            <textarea name="body" rows="10" cols="30" class="form-control">{{ $post->body }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Update" />
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
