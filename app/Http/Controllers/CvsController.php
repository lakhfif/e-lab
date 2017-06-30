<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membre;
use Response;
use File;
class CvsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $membres = Membre::paginate(6);
       return view('resumes.index',compact('membres'));
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

        $membre = Membre::where('id', '=' ,$id)->firstOrFail();
        $pdf = $membre->cv;
        $pdf = File::get(public_path().'\\uploads\\resume\\'.$pdf);
        $response = Response::make($pdf, 200); 
        $response->header('Content-Type', 'application/pdf'); 

        return $response; 

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

                'cv'=>'required',
                'nom'=>'required',
                
        ]);

       
       if($request->hasFile('cv')){

            $file = $request->file('cv');
            $destinationPath = public_path(). '/uploads/resume/';
            $file->move($destinationPath,$file->getClientOriginalName());

            $membre = Membre::where('nom', '=' ,$request->nom)->firstOrFail();

            $membre->update([

                'cv'=>$file->getClientOriginalName()

                ]);

       }

      return  redirect(route('cvs.index'));
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
