<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInformation;
use Illuminate\Support\Facades\Auth;
class Api_UserInformationController extends Controller
{
   


   public function __construct(){
    $this->middleware('auth');
                            }

    public function index()
    {
        $userinfo = UserInformation::findOrFail(Auth::User()->id);
        return json_encode($userinfo);
    }


    public function update(Request $request)
    {
        $userinfo = UserInformation::findOrFail(Auth::User()->id);
        $userinfo->firstname = $request->input('firstname');
        $userinfo->secondname = $request->input('secondname');
        $userinfo->surname = $request->input('surname');
        $userinfo->secondsurname = $request->input('secondsurname');
        $userinfo->placebirth = $request->input('placebirth');
        $userinfo->birthdate = $request->input('birthdate');
        $userinfo->phone = $request->input('phone');
        $userinfo->address = $request->input('address');
        $userinfo->status = 1;
        $userinfo->update();
        return "modificado userinfo";
    }

  
}
