<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Membre;

class Equipe extends Model
{
    //
	protected $fillable = ['nom'];

	public function membres() 
	{
	    return $this->hasMany('App\Models\Membre');
	}  

	public function projets() 
	{
	    return $this->hasMany('App\Models\Projet');
	}   


	public static function nombrePersonne($id){

		$membres = Membre::where('id', '=' ,$id);

		return $membres->count();
	}



}
