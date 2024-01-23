<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Idea;

class DashboardController extends Controller
{
    public function index() {
        $ideas = Idea::orderBy('created_at', 'DESC')->paginate(3);
        return view('dashboard', compact('ideas'));
    }
}
