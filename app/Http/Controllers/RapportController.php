<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapport;
use Response;
use File;

class RapportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rapports = Rapport::paginate(5);
        return view('rapports.index',compact('rapports'));
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
        if($request->hasFile('document')){

            $file = $request->file('document');
            $destinationPath = public_path(). '/uploads/rapport/';
            $file->move($destinationPath,$file->getClientOriginalName());

            Rapport::create([

                'nom'=>$request->nom,
                'document'=>$file->getClientOriginalName()

                ]);

       }

       return redirect(route('rapports.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rapport = Rapport::where('id', '=' ,$id)->firstOrFail();
        $pdf = $rapport->document;
        $pdf = File::get(public_path().'\\uploads\\rapport\\'.$pdf);
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
        $rapport = Rapport::findOrFail($id);
        $rapport->update([

            'nom'=>$request->nom

            ]);
        return redirect(route('rapports.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rapport::destroy($id);

        return redirect(route('rapports.index'));
    }
}
