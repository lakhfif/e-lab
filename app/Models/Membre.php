<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    //
	protected $fillable = ['nom','password','status','adresse','email','telephone','cv','description','equipe_id'];

	public function equipe() 
	{
		return $this->belongsTo('App\Models\equipe');
	}
	
	
}
