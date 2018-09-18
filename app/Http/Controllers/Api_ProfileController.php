<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use DB;


class Api_ProfileController extends Controller
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
        $profile =DB::table('profiles as pro')
        ->join('categories as cat','pro.idCategory','=','cat.id')
        ->join('appearances as app','pro.id','=','app.id')
        ->select('pro.*','cat.name as cat_name','app.*')
        ->where('pro.id','=',Auth::User()->id)->get();
        return json_encode($profile);
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
public function update(Request $request)
{
    //  $this->validate($request, [
    // 'phone' => 'max:10|numeric',
    // 'name'=>'max:15',
    // 'description'=>'max:300',
    // 'facebook'=>'max:191'
    // ]);

    $profile = Profile::findOrFail(Auth::User()->id);
if($request->input('name')== null){$profile->name = "";}else{$profile->name = $request->input('name'); }
if($request->input('description')== null){$profile->description = "";}else{$profile->description = $request->input('description'); }
if($request->input('phone')== null){$profile->phone = 0;}else{$profile->phone = $request->input('phone'); }
if($request->input('address')== null){$profile->address="";}else{$profile->address = $request->input('address'); }
if($request->input('web')== null){$profile->web ="";}else{$profile->web = $request->input('web'); }
if($request->input('instagram')==null){$profile->instagram="";}else{$profile->instagram=$request->input('instagram'); }
if($request->input('facebook')== null){$profile->facebook ="";}else{$profile->facebook = $request->input('facebook'); }
if($request->input('twitter')== null){ $profile->twitter = "";}else{$profile->twitter = $request->input('twitter'); }
$profile->idCategory = $request->input('idCategory'); 
           $profile->status = 1;
           $profile->update();

           if($profile->update){
            return response('information-updated', 200);
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
