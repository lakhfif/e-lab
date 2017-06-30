<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Laboratoire;
use App\Models\Membre;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laboratoire = Laboratoire::firstOrFail();
        return view('setting.index',compact('laboratoire'));
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
        //
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
        $laboratoire= Laboratoire::findOrFail($id);
        $membre = Membre::where('nom', '=' ,$request->membre)->firstOrFail();
       
       if($request->hasFile('image')){

            $file = $request->file('image');
            $destinationPath = public_path(). '/uploads/labo/';
            $file->move($destinationPath,$file->getClientOriginalName());


            $laboratoire->update([

            'nom'=>$request->nom,
            'adresse'=>$request->adresse,
            'description'=>$request->description,
            'telephone'=>$request->telephone,
            'membre_id'=>$membre->id,
            'image'=>$file->getClientOriginalName()

            ]);

            

        } else {

            $laboratoire->update([

            'nom'=>$request->nom,
            'adresse'=>$request->adresse,
            'description'=>$request->description,
            'telephone'=>$request->telephone,
            'membre_id'=>$membre->id,
            

            ]);
        }

       return redirect(route('settings.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
