<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        $pre_url= url()->previous();
        return view('admin.login',compact('pre_url'));
    }

    public function login_submit(Request $request){

            $this->validate($request, [
                'email' => 'required',
                'password' => 'required',
            ]);
            if(isset($request->remember) && $request->remember == "on"){
                setcookie('email',$request->email,time()+60*60*24*100);
                setcookie('password',bcrypt($request->password),time()+60*60*24*100);
            }
            else{
                setcookie('email',$request->email,100);
                setcookie('password',bcrypt($request->password),100);
            }
            $pre_url= url()->previous();
            if(str_contains($pre_url,'admin/login')){
                $role_id = 1;
            }
            else{
                $role_id = 2;
            }
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password , 'role_id' => $role_id])) {
                return redirect()->route('dashboard');

            } else {
                throw ValidationException::withMessages([
                    'error' => [trans('auth.failed')],
                ]);
                return back()->withInput($request->only('email', 'remember'));
            }

    }

    public function logout(){
        Auth::logout();
        return view('admin.login');
    }
}
