<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\User;
use Intranet\UserImage;

class UserImagesController extends Controller
{
		public function getCover(Request $request, $id)
    {
    	$user = User::find($id);
    	return response()->json(['message' => 'ok', 'url' => $user->cover]);
    }

    public function setCover(Request $request, $id)
    {
    	$user = User::find($id);
    	$filename = $request->file('file')->store('users', 'public');
    	$res = $user->update(['cover' => $filename]);

    	if ($res) {
    		return response()->json(['message' => 'ok']);
    	}
    }

    public function setPhoto(Request $request, $id)
    {
    	$user = User::find($id);
    	$filename = $request->file('file')->store('users', 'public');
    	$res = $user->photos()->create(['file' => $filename]);

    	$userImages = UserImage::where('user_id', $id)->get();

    	if ($res) {
    		return response()->json(['message' => 'ok', 'photos' => $userImages]);
    	}
    }

    public function getPhoto($id)
    {
    	return UserImage::where('user_id', $id)->get();
    }
}
