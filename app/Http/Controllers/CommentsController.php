<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsRequest;
use App\Post;

class CommentsController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function store(CommentsRequest $request)
    {
        $inputs = $request->all();
        $post = $this->post->find($inputs['post_id']);
        $post->comments()->create($inputs);
        return redirect()->route('posts.show', compact('post'));
    }

}

