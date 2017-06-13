<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Models\Panel\RSE;
use Intranet\Mail\JobNotification;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = RSE::all();
    	return view('jobs.index', compact('jobs'));
    }

    public function show($id)
    {
        $job = RSE::find($id);
    	return view('jobs.show', compact('job'));
    }

    public function apply($id)
    {
        $job = RSE::find($id);

        $job->users()->attach(\Auth::user());
         
         \Mail::to('lucasmichailian@gmail.com')->send(new JobNotification($job, \Auth::user()));
         \Flash::success('Aplicación enviada con éxito.');
    	
        return redirect('/jobs');
    }
}
