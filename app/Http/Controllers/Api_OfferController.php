<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Offer;
use App\Profile;
use DB;

class Api_OfferController extends Controller
{

    public function __construct(){

         $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $offers=Offer::all();
       return json_encode($offers);
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

        $this->validate($request, [
        'name' => 'max:25|required',
        'duedate' => 'required|max:30',
        'image' => 'required|max:800',
        'price' => 'required|max:30',
        'discount' => 'required|max:30',
        ]);

       $offer = new Offer;
       if($request->input('name')== null){}else{$offer->name = $request->input('name'); }
       if($request->input('description')== null){}else{$offer->description = $request->input('description'); }
       if($request->input('duedate')== null){}else{$offer->duedate = $request->input('duedate'); }
       if($request->input('price')== null){}else{$offer->price = $request->input('price'); }
       if($request->input('discount')== null){}else{$offer->discount = $request->input('discount'); }
       if($request->input('image')== null){}else{$offer->image = $request->input('image'); }
       $offer->idUser = Auth::User()->id;
       $offer->status = 1;
       $offer->save();
       if($offer->save()){return "offer posteada";}
       else{
        return Response::json($errors->all(), 500);  
             }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = DB::table('offers as off')->where('off.id','=',$id)
        ->join('profiles as pro','off.idUser','=','pro.id')
        ->join('appearances as app','off.idUser','=','app.id')
        ->select('off.*','pro.name as profile_name','app.logo','app.color1')->get();
        return json_encode($offer);
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
     public function update(Request $request,$id)
    {

        $this->validate($request, [
        'name' => 'max:25|required',
        'duedate' => 'required|max:30',
        'image' => 'required|max:800',
        'price' => 'required|max:30',
        'discount' => 'required|max:30',
        ]);

       $offer = Offer::findOrFail($id);
       if($request->input('name')== null){}else{$offer->name = $request->input('name'); }
       if($request->input('description')== null){}else{$offer->description = $request->input('description'); }
       if($request->input('duedate')== null){}else{$offer->duedate = $request->input('duedate'); }
       if($request->input('price')== null){}else{$offer->price = $request->input('price'); }
       if($request->input('discount')== null){}else{$offer->discount = $request->input('discount'); }
       if($request->input('image')== null){}else{$offer->image = $request->input('image'); }
       $offer->idUser = Auth::User()->id;
       $offer->status = 1;
       $offer->update();
       if($offer->update()){return "offer posteada";}
       else{
        return Response::json($errors->all(), 500);  
             }
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
