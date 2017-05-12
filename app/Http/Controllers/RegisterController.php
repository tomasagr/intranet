<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
		/**
		 * Render register index view
		 * @return Illuminate\View\View
		 */
    public function index()
    {
    	return view('register.index');
    }
}
