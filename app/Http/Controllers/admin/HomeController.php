<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function forgot_password (){
        return view('admin.forgot-password');
    }

    public function postForgetpassword(Request $request)
    {
      $request->validate([
        'email' => 'required|email|exists:users',
    ]);

    $password = rand(000000,999999);
    $user = User::where('email',$request->email)->first();
    $user->password = Hash::make($password);
    $user->save();
     Mail::send('email.forgetpassword', ['password' => $password], function($message) use($request){
        $message->to($request->email);
        $message->subject('Reset Password');
    });

    return back()->with('success', 'We have e-mailed your password reset link!');
}
}
