<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table='profiles';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=
    [
    	'name',
    	'phone',
    	'idCategory',
    	'lng',
    	'lat',
        'web',
        'facebook',
        'twitter',
        'instagram',
    	'address',
    	'description',
        'status'

    ];
    protected $guarded=[];
}
