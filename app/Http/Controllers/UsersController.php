<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function profile()
    {
    	return view('users.profile');
    }
}
