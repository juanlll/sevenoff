<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table='messages';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=['idEmmiter','idReceiver','text','status'];
    protected $guarded=[];
}
