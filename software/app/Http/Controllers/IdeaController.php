<?php

namespace App\Http\Controllers;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show(Idea $idea) {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea) {
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function store() {
        $validated = request()->validate([
            'content' => 'required|min:4',
        ]);
        $validated['user_id'] = auth()->id();
        Idea::create($validated);
        return redirect()->route('dashboard')->with('success', 'Idea was created successfully');
    }

    public function update(Idea $idea) {
        $validated = request()->validate([
            'content' => 'required|min:5|max:200',
        ]);
        $idea->update($validated);

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea was updated successfully');
    }

    public function destroy(Idea $idea) {
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea was deleted successfully');
    }
}
