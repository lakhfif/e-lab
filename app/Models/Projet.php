<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    
	protected $fillable = ['nom','description','equipe_id'];

	public function equipe() 
	{
		return $this->belongsTo('App\Models\equipe');
	}

	

}
