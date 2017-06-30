<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;

class EvenementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evenements = Evenement::paginate(2);
        return view('evenements.index',compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('evenements.create');
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

                'titre'=>'required',
                'date'=>'date',
        ]);

        
        if($request->hasFile('image')){

            $file = $request->file('image');
            $destinationPath = public_path().'/uploads/event/';
            $file->move($destinationPath,$file->getClientOriginalName());

            Evenement::create([
                'titre'=>$request->titre,
                'lieu'=>$request->lieu,
                'description'=>$request->description,
                'date'=>$request->date,
                'image'=>$file->getClientOriginalName()

                ]);

        

       }else {

            Evenement::create($request->all());
        }

       return redirect(route('evenements.index'));
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
        $evenement = Evenement::findOrFail($id);
        return view('evenements.edit',compact('evenement'));
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

                'titre'=>'required',
                'date'=>'date',
        ]);
        
        $evenement = Evenement::findOrFail($id);
       
       if($request->hasFile('image')){

            $file = $request->file('image');
            $destinationPath = public_path(). '/uploads/event/';
            $file->move($destinationPath,$file->getClientOriginalName());


            $publication->update([

            'titre'=>$request->titre,
            'lieu'=>$request->lieu,
            'description'=>$request->description,
            'date'=>$request->date,
            'image'=>$file->getClientOriginalName()

            ]);

            

        } else {

            $evenement->update($request->all());
        }

       return redirect(route('evenements.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Evenement::destroy($id);

        return redirect(route('evenements.index'));
    }
}
