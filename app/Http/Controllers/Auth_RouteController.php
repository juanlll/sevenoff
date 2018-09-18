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
use App\Notification;
use App\Category;
use App\Image;
use App\UserInformation;
use DB;
use JavaScript;



class Auth_RouteController extends Controller
{
    

public function __construct(){
	$this->middleware('auth');
}
 
public function configUser()// ruta para ir a la vista cuenta de la app
{
	
	$user = User::findOrFail(Auth::User()->id);
	JavaScript::put(['user'=>$user]);
return view("frontend.configuration.user.index");
}

public function configProfile()// ruta para ir a la vista cuenta de la app
{	$profile =DB::table('profiles as pro')
	->join('categories as cat','pro.idCategory','=','cat.id')
	->select('pro.*','cat.name as cat_name')
	->where('pro.id','=',Auth::User()->id)->first();
	$images = Image::orderBy('id','desc')->where('idUser','=',Auth::User()->id)->get();
	$categories= Category::select('id as value','name as label')->where('status','=',1)->get();
	$appearance=Appearance::all()->where('id','=',Auth::User()->id)->first();

	JavaScript::put(
		[
		'profile'=>$profile,
		'categories'=>$categories,
		'images'=>$images,
		'appearance'=>$appearance
		]);

return view("frontend.configuration.profile.index");
}

public function configPlan()// ruta para ir a la vista cuenta de la app
{
return view("frontend.configuration.plan.index");
}



public function messages()// ruta para ir a la vista cuenta de la app
{
return view("frontend.messages.index");
}

public function configUserInfo(){
	$userinformation = UserInformation::where('id','=',Auth::User()->id)->first();
	JavaScript::put([
				'userinfo'=>$userinformation
	]);
	return view("frontend.configuration.userinformation.index");

  
}

public function notifications()// ruta para ir a la vista cuenta de la app
{
$notifications = Notification::where('idUser','=',Auth::User()->id)->get();
return view("frontend.notifications.index",['notifications'=>$notifications]);
}

public function showOffer($id){



        $offer = DB::table('offers as off')->where('off.id','=',$id)
        ->join('profiles as pro','off.idUser','=','pro.id')
        ->join('appearances as app','off.idUser','=','app.id')
        ->select('off.*','pro.name as profile_name','app.logo','app.color1')->first();


$images = Image::orderBy('id','desc')->where('idUser','=',Auth::User()->id)->get();
if($offer->idUser == Auth::User()->id){
 JavaScript::put(['offer'=>$offer,'images'=>$images]);
 return view("frontend.offer.show",['offer'=>$offer]);}else{return "Esta oferta no es tuya!, sorry!";
}

}

public function indexOffer(){
 $offers = Offer::where('idUser','=',Auth::User()->id)->get();
 return view("frontend.offer.index",['offers'=>$offers]);
}


}
