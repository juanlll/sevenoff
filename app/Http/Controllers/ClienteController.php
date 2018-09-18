<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Perfil;
use App\Publicaciones;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;

class ClienteController extends Controller
{

   
    public function index()
    {
  return view("frontend.welcome");
    }

    public function getPublicaciones(){ 
        $publicaciones=Publicaciones::orderBy('id','desc')->paginate(100);
        return response($publicaciones, 200);
    }
    public function create()
    {
      
    }

    public function store(Request $request)
    {
      
    }

    public function show($id)
    {

try {
        $perfil= Perfil::findOrFail($id);
        $categoria=Categoria::findOrFail($perfil->categoria);
        $imagenes=DB::table('imagenes')->where('user','=',$id)->get();
        $publicaciones=Publicaciones::where('user','=',$id)->get();

        return view("frontend.perfil.index",
            ["perfil"=>$perfil,'categoria'=>$categoria,'imagenes'=>$imagenes,"publicaciones"=>$publicaciones]);
}
catch (\Exception $e) {
    return Redirect('/');
        
}

}

       
public function showPublicaciones($id){

 $publicaciones = Publicaciones::where('user','=',$id)->orderBy('id','desc')->paginate(6);
 return $publicaciones->toArray();


}

        
       
    

    public function getNotificaciones()
    {
    if (Auth::check()){$user_auth = Auth::User();}

            $notificaciones =DB::table('notificacion as not')
            ->join('user_notificacion as un','not.id','=','un.idNotificacion')
            ->select('*')
            ->where('un.idUser','=',$user_auth->id)->get();
            return json_encode($notificaciones);
    }

  
    public function update(Request $request, $id)
    {
       $book = Perfil::find($id);
        $book->nombre = $request->input('nombre');
        $book->direccion = $request->input('direccion');
        $book->update();
      return 'modificado!';
    }


    public function destroy($id)
    {
        
    }
}
