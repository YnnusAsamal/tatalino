<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SettingController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth'); //If user is not logged in then he can't access this page
    }
 
    public function edit($id)
    {
        $users = User::find(Auth::user()->id);
        return view('users.updatepassword',compact('users'));
    }
 
 
    public function update(Request $request, $id)
    {
 
         $this->validate($request, [
 
        'oldpassword' => 'required',
        'newpassword' => 'required',
        ]);
 
 
 
       $hashedPassword = Auth::user()->password;
 
       if (\Hash::check($request->oldpassword , $hashedPassword )) {
 
         if (!\Hash::check($request->newpassword , $hashedPassword)) {
 
              $users =User::find(Auth::user()->id);
              $users->password = bcrypt($request->newpassword);
              User::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));
 
              session()->flash('message','Password updated successfully');
              return redirect()->back();
            }
 
            else{
                  session()->flash('message','New password can not be the old password!');
                  return redirect()->back();
                }
 
           }
 
          else{
               session()->flash('message','Old password doesnt matched ');
               return redirect()->back();
             }
 
       }
}
