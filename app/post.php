<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Post extends Model
{
	//table name
    protected $table='posts';
    //primary key
    public $primary_key='id';
    //timestamps
    public $timestamps= true;
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
