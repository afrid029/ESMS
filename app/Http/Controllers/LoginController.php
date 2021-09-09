<?php

namespace App\Http\Controllers;
use Validator;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function index()
    {
        return view('first.index');
    }
    function checklogin(Request $request)
    {
        //Validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[!@#$%&*?]/'],
             
            [
                'password.min' => 'Password minimum length is 08',
                'password.regex' => 'Password should contain at least one uppercase letter, one lowercase letter,
                one digit, one special character'
            ]
        );

        //Authentication
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password') );
            
        if(Auth::attempt($user_data))
        {
            if(Auth::user()->role =='admin')
            {
                return view('dashboard.admin');
            }
            else if(Auth::user()->role =='employee')
            {
                return view('dashboard.employee');
            }
            else if(Auth::user()->role =='customer')
            {
                return view('dashboard.customer');
            }
        }
        else
        {
            return back()->with('error','Wrong Login Details');
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    function register()
    {
        return view('first.register');
    }
    function dashboard(){
        if(Auth::user()->role =='admin')
        {
            return view('dashboard.admin');
        }
        else if(Auth::user()->role =='employee')
        {
            return view('dashboard.employee');
        }
        else if(Auth::user()->role =='customer')
        {
            return view('dashboard.customer');
        }
    }
}

