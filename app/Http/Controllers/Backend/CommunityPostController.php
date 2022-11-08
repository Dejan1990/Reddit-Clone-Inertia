<?php

namespace App\Http\Controllers\Backend;

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
}
