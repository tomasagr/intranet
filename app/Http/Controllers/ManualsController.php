<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;

class ManualsController extends Controller
{
    public function index()
    {
    	return view('manuals.index');
    }
}
