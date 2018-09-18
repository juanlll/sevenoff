<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use DB;

class Api_ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
            $query = $request->input('search');
            $profiles=DB::table('profiles as pro')
            ->join('appearances as app','pro.id','=','app.id')
            ->join('categories as cat','pro.idCategory','=','cat.id')
            // ->join('profiles as pro','of.idUser','=','pro.id')
            ->select('pro.*','app.logo','cat.name as cat_name')
            ->where('pro.name', 'like','%'.$query.'%')
            ->where('pro.idCategory','=',$request->input('cat'))->get();

            return json_encode($profiles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
