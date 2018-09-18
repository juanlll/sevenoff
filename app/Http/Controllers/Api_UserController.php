<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Response;
use Hash;

class Api_UserController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::findOrFail(Auth::User()->id);
        return json_encode($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        $user = User::findOrFail(Auth::User()->id);
        if($request->input('name')== null){}else{$user->name = $request->input('name');}

        if($request->input('email')== null){}else{$user->email = $request->input('email');}

        if (Hash::check($request->input('oldpassword'), Auth::User()->password)){
        if($request->input('password')== null){}else{$user->password = bcrypt($request->input('password'));}
        }
        else{
            $returnData = array('oldpassword' => 'Contraseña antigua no valida!');
            return Response::json($returnData, 500);                                 
            }

        if($request->input('phone')== null){}else{$user->phone = $request->input('phone');}

        if($request->input('address')== null){}else{$user->address = $request->input('address');}

        if($request->input('placebirth')== null){}else{$user->placebirth = $request->input('placebirth');}

         if($request->input('birthdate')== null){}else{$user->birthdate = $request->input('birthdate');}

        $user->update();

        if($user->update){return "modificado!";}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
