<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        return view('posts.index');
    }

    public function show($id) {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    public function create() {
        return view('post.create');
    }

    public function store(Post $post) {
        $user_name = $post->input('user_name');
        $user_email = $post->input('user_email');
        $user_gender = $post->input('user_gender');
        $category = $post->input('category');
        $message = $post->input('message');

        $method = $post->method();

        $path = $post->path();

        $url = $request->url();

        $ip = $post->ip();

        $variables = [
            'user_name',
            'user_email',
            'user_gender',
            'category',
            'message',
            'method',
            'path',
            'url',
            'ip'
        ];

        return view('post.store', compact($variables));
    }
}
