<?php

namespace Intranet\Http\Controllers\Panel;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\AppBaseController;
use Intranet\UserVote;
use Intranet\User;
use Intranet\Mail\UserVoted;

class StarmeupController extends AppBaseController
{
    public function index() 
    {
        $users = UserVote::with('profile')->selectRaw('profile_id, count(*) as votos')
                            ->orderBy('votos', 'desc')
                            ->groupBy('profile_id')
                            ->get();
        
        
        return view('panel.starmeup.index', compact('users'));
    }

    public function refresh() 
    {
        UserVote::truncate();
        return redirect()->back();
    }

    public function star($id) 
    {
        $user = User::where('star', 1)->first();
        $started = User::find($id);

        if ($user instanceof User) {
            $user->update(['star' => !$user->star]);
        }

        $started->update(['star' => !$started->star]);
        
        \Mail::to($started)->send(new UserVoted($started));

        \Flash::success('Usuario destacado con exito.');
        
        return redirect()->back();
    }
}
