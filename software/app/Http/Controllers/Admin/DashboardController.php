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
//        // to print this message when that controller handled through a certain middleware
//        Log::info('inside admin dashboard controller');
        if(!Gate::allows('view.idea')) {
            abort(403);
        }

        return view('admin.dashboard');
    }
}
