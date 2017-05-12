<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;

class RinconController extends Controller
{
    public function index()
    {
    	return view('rincon.index');
    }
}
