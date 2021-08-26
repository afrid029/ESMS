<?php

namespace App\Http\Controllers;
use Validator;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function checklogin(Request $request)
    {
        //Validation
        $this->validate($request, [
            'email' => 'required|email',
            //'password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/'
        ],[
            'password.min'=>'Password minimum length is 08',
            //'password.regex' => 'Password should contain at least one uppercase letter, one lowercase letter, one digit, one special character'
        ]);
    
        //Authentication
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password') );
           
            
        if(Auth::attempt($user_data))
        {
           // return "ok";
           return view('admin.success');
        }
        else
        {
            return back()->with('error','Wrong Login Details');
        }
    }
    function successlogin()
    {
       return view('admin.success');
    }
}

