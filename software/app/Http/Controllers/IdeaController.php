<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store() {
        $validated = request()->validate([
            'content' => 'required|min:4',
        ]);

        Idea::create($validated);

        $ideas = Idea::orderBy('created_at', 'DESC')->paginate(3);
        return view('dashboard', compact('ideas'));
    }
}
