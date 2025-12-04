<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use App\Models\Applicant;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobApplied;

class ApplicantController extends Controller
{
    public function store (Request $request, Job $job):RedirectResponse {

        // check if the user has already applied
        $existingApplication = Applicant::where('job_id', $job->id)->where('user_id', Auth::id())->exists();

        if($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied to this job');
        }

        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'contact_phone' => 'string',
            'contact_email' => 'required|string|email',
            'message' => 'string',
            'location' => 'string',
            'resume' => 'required|file|mimes:pdf|max:2048'
        ]);

        // handle resume upload
        if($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $validatedData['resume_path'] = $path;
        }

        // store the application
        $application = new Applicant($validatedData);
        $application->job_id = $job->id;
        $application->user_id = Auth::user()->id;
        $application->save();

        // send email to owner
        Mail::to($job->user->email)->send(new JobApplied($application, $job));

        return redirect()->route('jobs.index')->with('success', 'Your application has been submitted');
    }

    public function destroy ($id): RedirectResponse {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();
        return redirect()->route('dashboard')->with('success', 'Applicant deleted successfully');
    }
}
