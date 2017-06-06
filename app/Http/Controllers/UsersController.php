<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\User;
use Intranet\UserVote;
use Intranet\Profile;
use Intranet\Mail\ToUserRegistered;
use Intranet\Mail\ToAdminUser;
use Intranet\Mail\ActivateUser;
use Intranet\Notifications\VotingNotify;

class UsersController extends Controller
{
    public function profile()
    {
        $voting = \Auth::user()->voting;
    	return view('users.profile', compact('voting'));
    }

    public function index() 
    {
        return User::with(['profile', 'unit', 'sector', 'voting'])->get();
    }

    public function search(Request $request) 
    {
        if ($request->q) {
            return User::where('fullname', 'LIKE', "%$request->q%")->get();
        } else {
            return User::all();
        }
    }

    public function show($id) 
    {
        $user = User::with(['voting', 'profile', 'unit', 'sector'])
                     ->find($id);
        return $user;
    }

    public function register(Request $request)
    {
        $data = $request->all();
    
        $user = $data['user'];
        $file = $data['file'] ?? null;

        if (!is_null($file)) {
            $path = $file->store('avatars', 'public');
            $user['avatar'] = $path;
        }

        $result = User::create($user);
      
        $adminsMails = User::where('rol_id', 1)
                            ->where('status', 1)
                            ->get()
                            ->pluck('email');

       \Mail::to($result)->send(new ToUserRegistered($result));
       \Mail::to($adminsMails)->send(new ToAdminUser($result));

        if ($result instanceof User) {
            if (isset($user['profile'])) {
                $result->profile()->create($user['profile']);
            }
            
            return response()->json(['message' => 'ok']);
        }
    }

    public function toggleStatus($id) 
    {
        $user = User::find($id);
        $adminsMails = User::where('rol_id', 1)
                            ->where('status', 1)
                            ->get()
                            ->pluck('email');

        $res = $user->update(['status' => !$user->status]);
        
        if ($res) {
            \Mail::to($user)->send(new ActivateUser($user));
            return redirect()->back();
        }
    }

    public function vote(Request $request, $id) 
    {
        $user = UserVote::where('user_id', \Auth::user()->id)
                         ->where('profile_id', $id)->get();

        if (count($user)) {
            \Flash::error('Votado anteriormente');
            return redirect()->back();
        }

        $userVote = UserVote::create([
            'user_id' => \Auth::user()->id, 
            'profile_id' => $id,
            'comments' => $request->comments
        ]);

        User::find($id)->notify(new VotingNotify($userVote));

        \Flash::success('Votación realizada éxito.');
        return redirect("/profile/$id");
    }


    public function update(Request $request, $id) 
    {
        $data = $request->all();
        $model = User::find($id);

        $user = $data['user'];
        $file = $data['file'] ?? null;

        if (!is_null($file)) {
            $path = $file->store('avatars', 'public');
            $user['avatar'] = $path;
        }

        $result = $model->update($user);

        if ($result) {
            if (isset($user['profile'])) {
                $profiledata =array_merge($user['profile'], ['user_id' => $id]);
                Profile::updateOrCreate($profiledata, $profiledata);
            }
            
            return response()->json(['message' => 'ok']);
        }
    }
}
