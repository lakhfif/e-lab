<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Evenement;
use App\Models\Projet;
use App\Models\Membre;
use App\Models\Publication;

class SearchController extends Controller
{
    public function getSearch(Request $request){

    	$evenements = Evenement::where('titre','LIKE','%'.$request->search.'%')->get();
    	$publications = Publication::where('titre','LIKE','%'.$request->search.'%')->get();
    	$membres = Membre::where('nom','LIKE','%'.$request->search.'%')->get();
    	$projets = Projet::where('nom','LIKE','%'.$request->search.'%')->get();
    	
    	return view('front.search.index',compact('evenements'));
    }
}
