<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;

class RSEController extends Controller
{
    public function solidaria()
    {
    	return view('rse.solidaria');
    }

    public function regional()
    {
    	return view('rse.regional');
    }

    public function begreen()
    {
    	return view('rse.begreen');
    }
}
