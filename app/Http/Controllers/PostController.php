<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        // return $this->middleware('auth');
    }

    public function create()
    {
        return view('post');
    }

    public function store(Request $request)
    {
        $post =  new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->user_id = Auth::user()->id;

        $post->save();

        return redirect('posts');
    }

    public function index()
    {
        $posts = Post::where('status', 1)->paginate(10);
        
        return view('index', compact('posts'));
    }

    public function edit($id) {
        $post = Post::find($id);
        return view('edit', compact('post'));
    }

    public function update($id, Request $request) {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;

        $post->update();
        return redirect('posts');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('show', compact('post'));
    }

    public function update_status($id, Request $request) {
        $post = Post::find($id);

        $post->status = 0;

        $post->update();
        return back();  
    }
}
