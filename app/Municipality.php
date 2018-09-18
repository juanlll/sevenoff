<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $table='municipalities';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=['name','text','status'];
    protected $guarded=[];
}
