<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Models\Membre;

class EquipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipes = Equipe::paginate(5);

        return view('equipes.index',compact('equipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $this->validate($request,[

                'nom'=>'required'
        ]);

       /* $membre = Membre::where('nom', '=' ,$request->membre)->first();
        
        if(!$membre){

            Equipe::create([

            'nom'=>$request->nom    

            ]);

        }else{*/
            Equipe::create([

            'nom'=>$request->nom
               

            ]);
       // }

        return redirect(route('equipes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

                'nom'=>'required'
        ]);

        $equipe = Equipe::findOrFail($id);
        /*$membre = Membre::where('nom', '=' ,$request->membre)->first();
        
        if(!$membre){

            $equipe->update([

            'nom'=>$request->nom    

            ]);

        }else{*/
            $equipe->update([

            'nom'=>$request->nom,

            ]);
       // }


        return redirect(route('equipes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipe = Equipe::findOrFail($id);
        
        if($equipe->etat){

            $equipe->update([

                'etat'=>false

            ]);

        } else {

            $equipe->update([

                'etat'=>true

            ]);

        }

         

        return redirect(route('equipes.index'));
    }
}
