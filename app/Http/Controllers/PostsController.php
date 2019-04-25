<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsRequest;
use App\Post;

class PostsController extends Controller
{

    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->orderBy('created_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostsRequest $request)
    {
        $inputs = $request->all();
        $this->post->create($inputs);
        return redirect()->to('/');
    }

}

