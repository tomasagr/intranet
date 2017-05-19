<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\User;
use Intranet\Profile;

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

        if ($result instanceof User) {
            if (isset($user['profile'])) {
                $result->profile()->create($user['profile']);
            }
            
            return response()->json(['message' => 'ok']);
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
