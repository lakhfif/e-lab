<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Membre;

class Equipe extends Model
{
    //
	protected $fillable = ['nom','membre_id'];

	public function membres() 
	{
	    return $this->hasMany('App\Models\Membre');
	}  

	public function projets() 
	{
	    return $this->hasMany('App\Models\Projet');
	}  

	 

	public static function responsable($id){

		$membre = Membre::where('id', '=' ,$id)->first();

		if($membre)
		return $membre->nom;
		else return '';
	}



}
