<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membre;
use App\Models\Equipe;

class MembresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membres = Membre::paginate(4);

        return view('membres.index',compact('membres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('membres.create');
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

                'nom'=>'required',
                'password'=>'required',
                'adresse'=>'required',
                'status'=>'required',
                'telephone'=>'required',
                'cv'=>'required',
                'equipe'=>'required',
                'email'=>'required'
            ]);
        

        if($request->hasFile('cv')){
            
            $file = $request->file('cv');
            $destinationPath = public_path(). '/uploads/resume/';
            $file->move($destinationPath,$file->getClientOriginalName());


            $equipe = Equipe::where('nom', '=' ,$request->equipe)->firstOrFail();
            

            Membre::create([

                 'nom'=>$request->nom,
                 'password'=>$request->password,
                 'adresse'=>$request->adresse,
                 'status'=>$request->status,
                 'email'=>$request->email,
                 'telephone'=>$request->telephone,
                 'cv'=>$file->getClientOriginalName(),
                 'description'=>$request->description,
                 'equipe_id'=>$equipe->id 

                ]);

            return redirect(route('membres.index'));
        }



        
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
        $membre = Membre::findOrFail($id);

        return view('membres.edit',compact('membre'));
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

                'nom'=>'required',
                'password'=>'required',
                'adresse'=>'required',
                'status'=>'required',
                'telephone'=>'required',
                'equipe'=>'required',
                'email'=>'required'
            ]);
        
         $equipe = Equipe::where('nom', '=' ,$request->equipe)->firstOrFail();

         $membre = Membre::findOrFail($id);

         $membre->update([

                 'nom'=>$request->nom,
                 'password'=>$request->password,
                 'adresse'=>$request->adresse,
                 'status'=>$request->status,
                 'email'=>$request->email,
                 'telephone'=>$request->telephone,
                 'description'=>$request->description,
                 'equipe_id'=>$equipe->id 

                ]);

            return redirect(route('membres.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Membre::destroy($id);

        return redirect(route('membres.index'));
    }
}
