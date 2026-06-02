<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ApplicationController extends Controller{

    public function store(Request $request, Job $job) : RedirectResponse{
    
        $user = $request->user();

        $applied = Application::where('candidate_id', $user->candidate->id)
        ->where('job_listing_id', $job->id)->first();

        if($applied){
            return Redirect(route('jobs.show', $job));
        }
        
        Application::create(['candidate_id' => $user->candidate->id, 
            'job_listing_id' => $job->id, 'status'=> "Pendente" 
        ]);

        return Redirect(route('jobs.show', $job));

    }

}