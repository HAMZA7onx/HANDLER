<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }
}
