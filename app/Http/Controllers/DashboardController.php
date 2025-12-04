<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(): View {
        // Get logged in user
        $user = Auth::user();
        
        // Get user listings
        $jobs = Job::where('user_id', $user->id)->with('applicants')->get();
        
        return view('dashboard.index', compact('user', 'jobs'));
    }
}
