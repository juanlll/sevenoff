<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table='offers';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=
    [
    	'name',
    	'idUser',
    	'description',
    	'image',
    	'price',
    	'discount',
    	'duedate',
    	'status'
    ];
    protected $guarded=[];
}
