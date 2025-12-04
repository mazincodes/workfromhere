<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Job;
use App\Models\User;

class BookmarkController extends Controller
{
    public function index (): View {
        $user = Auth::user();
        $bookmarks = $user->bookmarkedJobs()->orderBy('job_user_bookmarks.created_at', 'desc')->paginate(9);
        return view('jobs.bookmarked')->with('bookmarks', $bookmarks);
    }
    
    public function store (Job $job):RedirectResponse {
        $user = Auth::user();
        // check if job is already bookmarked
        if($user->bookmarkedJobs()->where('job_id', $job->id)->exists()) {
            return back()->with('error', 'Job is already bookmarked');
        }
        else {
            // create a new bookmark
            $user->bookmarkedJobs()->attach($job->id);
            return back()->with('success', 'Job bookmarked successfully');
        }
    }

    public function destroy (Job $job):RedirectResponse {
        $user = Auth::user();
        // check if job is NOT bookmarked
        if(!$user->bookmarkedJobs()->where('job_id', $job->id)->exists()) {
            return back()->with('success', 'Job bookmarked successfully');
        }
        else {
            // remove bookmark
            $user->bookmarkedJobs()->detach($job->id);
            return back()->with('error', 'Job is not bookmarked');
        }
    }
}
