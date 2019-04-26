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
        $posts = $this->post->orderBy('created_at', 'desc')->paginate(10);
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
        return redirect()->route('top');
    }

    public function show($post_id)
    {
        $post = $this->post->find($post_id);
        return view('posts.show', compact('post'));
    }

    public function edit($post_id)
    {
        $post = $this->post->find($post_id);
        return view('posts.edit', compact('post'));
    }

    public function update(PostsRequest $request, $post_id)
    {
        $inputs = $request->all();
        $post = $this->post->find($post_id);
        $post->fill($inputs)->save();
        return redirect()->route('posts.show', compact('post'));
    }

    public function destroy($post_id)
    {
        $this->post->find($post_id)->delete();
        return redirect()->route('top');
    }

}

