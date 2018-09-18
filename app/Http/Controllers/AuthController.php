<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use App;
use DB;

class AuthController extends Controller
{



public function checkSession(Request $request)
{


		$offers = DB::table('offers as off')->where('off.idUser','=',Auth::User()->id)
		->join('profiles as pro','off.idUser','=','pro.id')
        ->select('off.*','pro.name as profile_name')
        ->whereDate('duedate', '>=', date('Y-m-d'))
        ->orderBy('id','desc')
        ->paginate(6);
        return json_encode($offers);

}
}
