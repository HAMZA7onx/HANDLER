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

        return redirect()->route('dashboard');
    }

    public function destroy(Idea $idea) {
        $idea->delete();

        return redirect()->route('dashboard');
    }
}
