<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Redirect;

class CommunityPostController extends Controller
{
    public function create(Community $community)
    {
        return Inertia::render('Communities/Posts/Create', [ 'community' => $community ]); 
    }

    public function store(StorePostRequest $request, Community $community)
    {
        /*$community->posts()->create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description
        ]);*/

        $community->posts()->create(
            $request->validated() + ['user_id' => auth()->id()]
        );

        return Redirect::route('frontend.communities.show', $community->slug);
    }

    public function edit(Community $community, Post $post)
    {
        return Inertia::render('Communities/Posts/Edit', compact('community', 'post')); 
    }

    public function update(StorePostRequest $request, Community $community, Post $post)
    {
        $post->update($request->validated());

        return Redirect::route('frontend.communities.posts.show', [$community->slug, $post->slug]);
    }

    public function destroy(Community $community, Post $post)
    {
        $post->delete();
        return Redirect::route('frontend.communities.show', $community->slug);
    }
}
