<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Idea;

class DashboardController extends Controller
{
    public function index() {
        $ideas = Idea::all();
        return view('dashboard', compact('ideas'));
    }

}
