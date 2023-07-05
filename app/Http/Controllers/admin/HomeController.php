<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Mail;

class HomeController extends Controller
{
   public function forgetpassword (){
        $pre_url= url()->previous();
        return view('admin.forgot-password',compact('pre_url'));
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
     Mail::send('email.forgotpassword', ['password' => $password], function($message) use($request){
        $message->to($request->email);
        $message->subject('Reset Password');
    });
    return back()->with('success', 'We have e-mailed your password reset link!');
   }
}
