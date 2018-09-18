<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appearance extends Model
{
   	protected $table='appearances';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=['color1','color2','color3','background','status','bgx','bgy','logo'];
    protected $guarded=[];
}
