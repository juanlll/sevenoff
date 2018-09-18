<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table='departments';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=['name','idCountry','status'];
    protected $guarded=[];
}
