<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();

        // id of all the poeple that we are following
        $followingIDs = $user->followings()->pluck('user_id');
        $ideas = Idea::whereIn('user_id', $followingIDs)->latest();

        if(request()->has('search')) {
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search','') . '%');
        }

        $ideas = $ideas->paginate(3);

        return view('dashboard', compact('ideas'));
    }
}
