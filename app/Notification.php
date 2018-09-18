<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
   	protected $table='notifications';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=['name','description','idUser','status'];
    protected $guarded=[];
}
