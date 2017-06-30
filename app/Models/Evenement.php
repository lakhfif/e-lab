<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Datetime;

class Evenement extends Model
{
    
	protected $fillable = ['titre','lieu','description','date','image'];


	public static function getDay($string){

      $date = preg_split( "/[\s-]+/", $string );

      return $date;
	}

	

}
