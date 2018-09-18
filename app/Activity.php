<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table='activities';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=['name','description','image','icon','status'];
    protected $guarded=[];
}
