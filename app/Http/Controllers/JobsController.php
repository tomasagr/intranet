<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
    	return view('jobs.index');
    }

    public function show()
    {
    	return view('jobs.show');
    }
}
