<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;



class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $featuredPosts = Cache::remember('featuredPosts', now()->addMinute(), function () {
            return Post::published()->featured()->with('categories')->latest('published_at')->take(3)->get();
        });

        $latestPosts = Cache::remember('latestPosts', now()->addMinute(), function () {
            return Post::published()->with('categories')->latest('published_at')->take(9)->get();
        });

        return view('home',[

            'featuredPosts' => $featuredPosts,
            'latestPosts' => $latestPosts
        ]);
    }


}
