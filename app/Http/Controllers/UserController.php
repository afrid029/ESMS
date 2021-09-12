<?php

namespace App\Http\Controllers;
use Validator;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->where ('role','employee');
        return view('employeef.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employeef.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate(
            [
                'name' =>'required',
                'email'=>'required',
                'password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[!@#$%&*?]/',
                'gender' => 'required',
                'mobile' => 'required',
                'address' => 'required'
            ],
            [
                'password.min' => 'Password minimum length is 08',
                'password.regex' => 'Password should contain at least one uppercase letter, one lowercase letter,
                one digit, one special character'
            ]
            );

        $user = new User([
            'name'=> $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'gender'=> $request->get('gender'),
            'mobile'=> $request->get('mobile'),
            'role'=> $request->get('role'),
            'address'=> $request->get('address'),
          // 'remember_token'=> Str::random(10)
            
        ]);

        $user->save();
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );
        if($request->get('role') == 'customer')
        {
            if(Auth::attempt($user_data))
            {
                return view('dashboard.customer');
            }
        }
        else
        {
            //User::create($request->all());
            return redirect()-> route('users.index')->with('success','Employee Added Successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    function show(User $user)
    {
        return view('employeef.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    function edit(User $user)
    {
        return view('employeef.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name' =>'required',
                'email'=>'required'
            ]);
            $user-> update($request->all());
            return redirect()-> route('users.index');
         

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    function destroy(User $user)
    {
        
        $user->delete();
        return redirect()-> route('users.index');
    }

}