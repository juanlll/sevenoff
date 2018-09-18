<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Appearance; 
class Api_AppearanceController extends Controller
{
    public function __construct(){
       $this->middleware('auth');
    }


    public function index()
    {
       $appearance = Appearance::findOrFail(Auth::User()->id);
       return json_encode($appearance);
    }

    public function update(Request $request)
    {

        $this->validate($request, [
        'color1' => 'max:25',
        'color2' => 'max:25',
        'color3' => 'max:25',
        'background' => 'max:800'
        ,'logo'=>'min:20'
        ]);

       $appearance = Appearance::findOrFail(Auth::User()->id);
       if($request->input('color1')== null){}else{$appearance->color1 = $request->input('color1'); }
       if($request->input('color2')== null){}else{$appearance->color2 = $request->input('color2'); }
       if($request->input('color3')== null){}else{$appearance->color3 = $request->input('color3'); }
       if($request->input('background')== null){}else{$appearance->background = $request->input('background'); }
       if($request->input('bgy')== null){}else{$appearance->bgy = $request->input('bgy'); }
       if($request->input('bgx')== null){}else{$appearance->bgx = $request->input('bgx'); }
       if($request->input('logo')== null){}else{$appearance->logo = $request->input('logo'); }
       $appearance->update();
       if($appearance->update){
         return response('Appearance-updated', 200);
       }
    }

}
