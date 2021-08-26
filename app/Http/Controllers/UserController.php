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
        return  "ok";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
                'gender'=>'required',
                'address'=>'required',
                'mobile'=>'required',
                'password'=>'required',
            ]
            );

        $user_data = array(
            'name'=> $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'gender'=> $request->get('gender'),
            'mobile'=> $request->get('mobile'),
            'role' => 'customer',
            'address'=> $request->get('address'),
        );
        User::create($user_data);
        return redirect('/')->with('success','Registered Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    function edit(User $user)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    function destroy(User $user)
    {
        //
    }

}