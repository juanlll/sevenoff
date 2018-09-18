<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Perfil;
use App\Publicaciones;
use App\Imagenes;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\PerfilFormRequest;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\PublicacionesFormRequest;
use App\Http\Requests\ImagenesFormRequest;
use Session;

use Illuminate\Support\Facades\Auth;
use DB;

class PerfilController extends Controller
{


   public function __construct()
   {
    $this->middleware('auth');
    
}

public function showCuenta()
    {

    if (Auth::check()){$user_auth = Auth::User();}

         $notificaciones =DB::table('notificacion as not')
            ->join('user_notificacion as un','not.id','=','un.idNotificacion')
            ->select('*')
            ->where('un.idUser','=',$user_auth->id)->get();
            
    $perfil= Perfil::findOrFail($user_auth->id);
 
           


    return view("frontend.perfil.cuenta",
    ["perfil"=>$perfil,'notificaciones'=>$notificaciones]);



}


public function update(PerfilFormRequest $request,$id)
{

    $perfil=Perfil::findOrFail($id);
    $perfil->nombre=$request->get('nombre');
    $perfil->direccion=$request->get('direccion');
    $perfil->color1=$request->get('color1');
    $perfil->color2=$request->get('color2');
    $perfil->color3=$request->get('color3');
     if (Input::hasFile('logo')){
           $file=Input::file('logo');
           $nombre_imagen="(".$id.")".$file->getClientOriginalName();
           $file->move(public_path().'/imagenes/perfil/',$nombre_imagen);
           $perfil->logo=$nombre_imagen;
        }
    $perfil->update(); 
    Session::flash('message','Perfil editado');

    return Redirect::to('local/'.$perfil->id);
}

public function updateUser(UserFormRequest $request)
{
    if (Auth::check()){$user_auth = Auth::User();}
   $user = User::find($user_auth->id);
   if($request->input('name')== null){}else{$user->name = $request->input('name'); $user->update(); }

   if($request->input('email')== null){}else{$user->email = $request->input('email'); $user->update(); }

   if($request->input('password')==null){}else{$user->password = bcrypt($request->input('password')); $user->update(); }



   if ($user->update()) {
    return 'Correcto!';
}
}



public function show(){


    if (Auth::check())
    {
     $user_auth = Auth::User();
 }
 $user = User::select('name','email','updated_at')->find($user_auth->id);
 return response()->json([ $user,], 200);
}



//publicaciones crud
public function store(PublicacionesFormRequest $request){
if (Auth::check()){  $user_auth = Auth::User(); }//verifica que el usuario este auth

        $publicacion = new Publicaciones;
        $publicacion->nombre = $request->input('nombre');
        $publicacion->tipo = 1;
        $publicacion->user = $user_auth->id;
        $publicacion->descripcion=$request->input('descripcion');
        
if(!$request->input('imagen')==""){$publicacion->imagen=$request->input('imagen');}else{$publicacion->imagen="";}
        $publicacion->descuento=$request->input('descuento');
        $publicacion->precio=$request->input('precio');
        $publicacion->fecha_final=$request->input('fecha_final');
        $publicacion->save();
        if ($publicacion->save()) {
        return $publicacion;
        }

}//endfunction StorePublicaciones


public function showPublicaciones(){
 if (Auth::check()){$user_auth = Auth::User();}
 $publicaciones = Publicaciones::where('user','=',$user_auth->id)->orderBy('id','desc')->paginate(6);
 return $publicaciones->toArray();
}
public function updatePublicaciones(PublicacionesFormRequest $request,$id){

   if (Auth::check())
    {
     $user_auth = Auth::User();
 }

        $publicacion = Publicaciones::findOrFail($id);
        $publicacion->nombre = $request->input('nombre');
        $publicacion->tipo = 1;
        $publicacion->user = $user_auth->id;
        $publicacion->descripcion=$request->input('descripcion');
if(!$request->input('imagen')==""){$publicacion->imagen=$request->input('imagen');}else{$publicacion->imagen="";}
        $publicacion->descuento=$request->input('descuento');
        $publicacion->precio=$request->input('precio');
        $publicacion->fecha_final=$request->input('fecha_final');
        $publicacion->update();
        return 'modificado';
}

public function destroyPublicaciones($id){
  $taks = Publicaciones::findOrFail($id);
        $taks->delete();
        return 'eliminado';
}




public function showPerfil(){

  if (Auth::check())
{
 $user_auth = Auth::User();
}

$perfil = Perfil::select('nombre','color1','color2','color3','telefono','direccion')->find($user_auth->id);
return $perfil->toArray();
}



public function getImagenes(){

if (Auth::check()){$user_auth = Auth::User();}//verifico si esta autentificado

$imagenes = Imagenes::select('id','url')->where('user','=',$user_auth->id)->get();

return $imagenes;

}


public function deleteImagenes($id){
    $imagen = Imagenes::findOrFail($id);
    $imagen->delete();
    return 'eliminado';
}





public function postImagenes(ImagenesFormRequest $request){
if (Auth::check()){  $user_auth = Auth::User(); }//verifica que el usuario este auth
        $imagen = new Imagenes;
        $imagen->url = $request->input('url');
        $imagen->user = $user_auth->id;
        $imagen->save();

        if ($imagen->save()) {return $imagen;}

}

public function putColores(Request $request){
if (Auth::check()){  $user_auth = Auth::User(); }//verifica que el usuario este auth
        $perfil = Perfil::findOrFail($user_auth->id);
        $perfil->color1 = $request->input('color1');
        $perfil->color2 = $request->input('color2');
        $perfil->color3 = $request->input('color3');
        $perfil->update();
        return 'modificados los colores del perfil';

}




}//endclass
