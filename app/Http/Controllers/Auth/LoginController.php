<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
        return view('login');
    }
    public function login(Request $request)
    {  
        $inputVal = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        
        if(Auth::attempt($request->only('email', 'password'))){
            if (auth()->user()->user_access == 1) {
                return redirect()->route('ketua-bidang.home');
            }else if(auth()->user()->user_access == 2){
                return redirect()->route('verifikator.home');
            }else if(auth()->user()->user_access == 3){
                return redirect()->route('bendahara.home');
            }else if(auth()->user()->user_access == 4){
                return redirect()->route('ketua-harian.home');
            }else if(auth()->user()->user_access == 5){
                return redirect()->route('admin.home');
            }
            else{
                return redirect()->intended('login');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email & Password are incorrect.');
        }     
    }
}
