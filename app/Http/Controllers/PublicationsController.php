<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;

class PublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::paginate(2);

        return view('publications.index',compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       return view('publications.create');
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
                'article'=>'required'
            ]);

        if($request->hasFile('file')){

            $file = $request->file('file');
            $destinationPath = public_path(). '/uploads/posts/';
            $file->move($destinationPath,$file->getClientOriginalName());


            Publication::create([

            'titre'=>$request->titre,
            'article'=>$request->article,
            'file'=>$file->getClientOriginalName()

            ]);

            

        } else {

            Publication::create($request->all());
        }

       return redirect(route('publications.index'));
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
        $publication = Publication::findOrFail($id);
        return view('publications.edit',compact('publication'));
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
                'article'=>'required'
            ]);

        
        $publication = Publication::findOrFail($id);
       
       if($request->hasFile('file')){

            $file = $request->file('file');
            $destinationPath = public_path(). '/uploads/posts/';
            $file->move($destinationPath,$file->getClientOriginalName());


            $publication->update([

            'titre'=>$request->titre,
            'article'=>$request->article,
            'file'=>$file->getClientOriginalName()

            ]);

            

        } else {

            $publication->update($request->all());
        }

       return redirect(route('publications.index'));
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Publication::destroy($id);

        return redirect(route('publications.index'));
    }
}
