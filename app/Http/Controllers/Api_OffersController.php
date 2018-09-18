<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use DB;

class Api_OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        $offers = Offer::where('name', 'like','%'.$query.'%')->get();

            // $offers=DB::table('offers as of')
            // ->join('profiles as pro','of.idUser','=','pro.id')
            // ->select('pro.idCategory as idcategoria','of.*')
            // ->where('of.name', 'like','%'.$query.'%')
            // ->where('pro.idCategory','=',$request->input('cat'))->get();


        return json_encode($offers);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offers = DB::table('offers as off')->where('off.idUser','=',$id)
        ->join('profiles as pro','off.idUser','=','pro.id')
        ->join('appearances as app','off.idUser','=','app.id')
        ->select('off.*','pro.name as profile_name','app.logo')
        ->whereDate('duedate', '>=', date('Y-m-d'))
        ->orderBy('id','desc')
        ->paginate(6);
        return json_encode($offers);
    }



   
   

   
}
