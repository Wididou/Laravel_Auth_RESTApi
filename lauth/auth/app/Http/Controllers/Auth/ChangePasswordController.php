<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('auth.passwords.change');
    }
    public function changepwd(Request $request)
    {
        $this->validate($request,[
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        $hashpassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashpassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('successMsg', 'Password successfully changed');
        }else{
            return redirect()->back()->with('errorMsg', 'Current Password is invalid');
        }
    }
}
