<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(UserProfile $userProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userId = User::with('profile')->findOrFail($id);
        
        // $profile = UserProfile::where('user_id', $userId)->first();

        return view('userprofiles.edit', compact('userId'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail(Auth::id());

        $profile = UserProfile::where('user_id', $user->id)->first();

        if (!$profile) {
            Alert::error('Error', 'Profile not found!');
            return redirect()->back();
        }

        // Remove or comment out this validation block
        /*
        $request->validate([
            'user_description' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:500',
            'hobby' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        */

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            if ($profile->image && file_exists(public_path($profile->image))) {
                unlink(public_path($profile->image));
            }

            $image->move(public_path('assets/userprofiles'), $imageName);

            $profile->image = 'assets/userprofiles/' . $imageName;
        }

        $profile->user_description = $request->input('user_description');
        $profile->bio = $request->input('bio');
        $profile->hobby = $request->input('hobby');

        $profile->save();

        Alert::success('Success', 'Profile updated successfully!');
        return redirect()->back();
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
