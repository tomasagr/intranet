<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function panel()
    {
        return view('panel');
    }

     public function index()
    {
        $started = User:: where('star', 1)->first();


        return view('home.index', compact('started'));
    }

    public function mark($uid) 
    {
        $user = \Auth::user();

        $notification = $user->unreadNotifications->first(function($element) use ($uid) {
            return $element->id == $uid;
        });

        $notification->markAsRead();

        if ($notification->type == 'Intranet\Notifications\VotingNotify') {
            return redirect('/profile#votes');
        } else if ($notification->type == 'Intranet\Notifications\ComentarioNotificacion') {
            return redirect('/topic/'. $notification->notifiable_id);
        }
    }
}
