<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userEdit()
    {   
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            if ($user) {
                return view('editUser')->withUser($user);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function userUpdate(Request $request)
    { 
        $request->validate([
            'name' =>'required|min:4|string|max:255',
            'username' =>'required|min:4|unique:users|string|max:255',
            'email'=>'required|email|unique:users|string|max:255',
            'confirm_password' => ['same:password'],
        ]);
        $user =Auth::user();
        $user->name = $request['name'];
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->save();

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => bcrypt($request->password)
            ]);
            return back()->with('success', 'Password successfully changed!');
        } else {
            return back()->with('error', 'Current password does not match!');
        }
    }
}