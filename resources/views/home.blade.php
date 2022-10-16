@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <table class="table table-striped">
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
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">view</a>
                                <a class="btn btn-primary" href="{{ route('post.update_status' ,$post->id) }}">Hide</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
        
                    </table>
                            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
