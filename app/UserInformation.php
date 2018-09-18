<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
  	protected $table='user_information';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=
    [
    	'firstname',
    	'secondname',
    	'surname',
    	'secondsurname',
    	'placebirth',
    	'birthdate',
    	'phone',
    	'address',
    	'status'
    ];
    protected $guarded=[];
}
