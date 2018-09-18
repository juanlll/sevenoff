<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Image;

class Api_ImagesController extends Controller
{
    

    public function index()
    {   if(Auth::check()){
        $images = Image::orderBy('id','desc')->where('idUser','=',Auth::User()->id)->get();
        return json_encode($images);
        }else{
            $images=[];
            return $images;
        }
    }

    public function store(Request $request)
    {
        if(Auth::check()){
        $image = new Image();
        $image->name = $request->input('name');
        $image->url = $request->input('url');
        $image->idUser = Auth::User()->id;
        $image->status = 1;
        $image->save();
        return "img ok";
    }else{
        return "no te encuentras logueado!";
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check()){
       $img = Image::find($id);
       $img->delete();
        return "204";}else{return "no te encuentras logueado";}
    
    }


}
