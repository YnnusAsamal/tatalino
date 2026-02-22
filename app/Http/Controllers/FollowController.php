<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function toggle($id)
    {
        $userToFollow = User::findOrFail($id);

        if (Auth::id() == $id) {
            return back(); // prevent self-follow
        }

        if (Auth::user()->following()->where('following_id', $id)->exists()) {
            Auth::user()->following()->detach($id); // Unfollow
        } else {
            Auth::user()->following()->attach($id); // Follow
        }

        return back();
    }
}
