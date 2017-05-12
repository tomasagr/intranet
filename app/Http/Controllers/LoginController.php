<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
		/**
		 * Get main login page
		 * @return view
		 */
    public function index()
    {
    	return view('login.index');
    }
}
