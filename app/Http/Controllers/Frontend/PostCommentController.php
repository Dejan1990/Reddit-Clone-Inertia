<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostCommentController extends Controller
{
    public function store($community_slug, Post $post)
    {
        $post->comments()->create([
            'user_id' => auth()->id(),
            //'content' => Request::input('content')
            'content' => request('content')
        ]);

        return back();
    }
}
