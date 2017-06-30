<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Models\Membre;
use App\Models\Projet;
use App\Models\Evenement;
use App\Models\Publication;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::take(3)->get();
        $membres = Membre::take(3)->get();
        $projets = Projet::take(3)->get();
        $evenements = Evenement::take(3)->get();
        $equipes = Equipe::take(3)->get();

        return view('dashboard.index',compact('publications','membres','projets','evenements','equipes'));
    }

   
}
