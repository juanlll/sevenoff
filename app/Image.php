<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table='images';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=['name','idUser','url','status'];
    protected $guarded=[];
}
