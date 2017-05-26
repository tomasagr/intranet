<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\User;
use Intranet\Profile;
use Intranet\Mail\ToUserRegistered;
use Intranet\Mail\ToAdminUser;
use Intranet\Mail\ActivateUser;

class UsersController extends Controller
{
    public function profile()
    {
    	return view('users.profile');
    }

    public function show($id) 
    {
        return User::with('profile')->find($id);
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
