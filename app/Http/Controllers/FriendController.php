<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Friendship;
use Realshid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FriendController extends Controller
{
    public function sendRequest($id)
    {
        Friendship::create([
            'user_id' => auth()->id(),
            'friend_id' => $id,
            'status' => 'pending'
        ]);

        return back();
    }
}
