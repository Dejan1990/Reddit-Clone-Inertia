<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubredditController extends Controller
{
    public function show($slug)
    {
        return Inertia::render('Subreddits/Show', [
            'subreddit' => Community::where('slug', $slug)->first()
        ]);
    }
}
