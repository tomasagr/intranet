<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\User;

class ProfileController extends Controller
{
    public function show($id) 
    {
        if ($id == \Auth::user()->id) {
            return redirect('/profile');
        }
        $user = User::with(['sector', 'unit', 'profile'])->find($id);
        return view('profile.show', compact('user'));
    }
}
