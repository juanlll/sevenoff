<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;
use App\Offer;
use App\Appearance;
use App\Category;
use DB;
use JavaScript;


class RouteController extends Controller
{//inicio clase

public function start() // ruta para ir a la vista index de la app
{
// $offers = Offer::whereDate('duedate', '>=', date('Y-m-d'))->orderBy('id','desc')->get();

		    $offers = DB::table('offers as off')
        ->join('profiles as pro','off.idUser','=','pro.id')
        ->join('appearances as app','off.idUser','=','app.id')
        ->select('off.*','pro.name as profile_name','app.logo as logo')
        ->whereDate('duedate', '>=', date('Y-m-d'))
        ->orderBy('id','desc')->limit(6)
        ->get();

$categories=Category::select('id as value','name as label')->where('status','=',1)->get();
JavaScript::put(['offers'=>$offers,'categories'=>$categories]);
return view("frontend.start.index");
}

public function profile($id)// ruta para ir a la vista perfil de la app
{
  if(Profile::findOrFail($id)){
 $profile = DB::table('profiles as pro')
->join('categories as cat','pro.idCategory','=','cat.id')
->select('pro.*','cat.name as cat_name')
->where('pro.id','=',$id)->first();
$appearance=Appearance::all()->where('id','=',$id)->first();
$categories=Category::select('id as value','name as label')->where('status','=',1)->get();

  JavaScript::put([
  'id_profile'=>$profile->id,
   'profile'=>$profile,
   'appearance'=>$appearance,
   'categories'=>$categories
    ]);

return view("frontend.profile.index",['profile'=>$profile,'appearance'=>$appearance]);

  }else {return view('errors.404');}
 

}

public function configuration()// ruta para ir a la vista cuenta de la app
{
$user = User::findOrFail(Auth::User()->id);
JavaScript::put(['user'=>$user]);
return view("frontend.configuration.index",['user'=>$user]);
}






}//fin clase
