<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index() {
//        if(!auth()->user()->is_admin) {
//            abort('403');
//        }
        Log::info('inside admin dashboard controller');

        return view('admin.dashboard');
    }
}
