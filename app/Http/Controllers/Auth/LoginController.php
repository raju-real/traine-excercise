<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showAdminLoginForm(){
        return view("auth.admin_login");
    }

    public function adminLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required'
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role'=> 'admin'], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));

        } else {
            // if unsuccessful, then redirect back to the login with the form data
            return redirect()->back()->withInput($request->only('email', 'remember'))->with('message','Email Or Password Mismatched');
        }
    }

    public function adminLogout(){
        Auth::guard('admin')->logout();
        Auth::guard('web')->logout();
        session()->flush();
        session()->regenerate();
        return redirect()->route('admin')->with('message','Admin Logout Successfully');
    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
