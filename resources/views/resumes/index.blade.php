@extends('layouts.admin')


@section('content')
		
		<div class="row">

                          <div class="col-md-8 right-cell">
                           <div  class="left-cell-axe" >
                             <header>
                               <h5><b>Resumes</b></h5>
                             </header>
                             <table class="table table-striped ">
                               <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nom</th>
                                  <th>cv</th>
                                </tr>
                              </thead>
                              <body>

                              @foreach($membres as $membre)
                                 <tr>
                                  <td>{{$membre->id}}</td>
                                  <td>{{$membre->nom}}</td>
                                  <td >
                                    <a href="{{route('cvs.show',$membre)}}" class="btn btn-sm btn-success ">
                                       <span class="glyphicon glyphicon-eye-open"></span>
                                       <span>Voir</span>
                                    </a>
                                  </td>
                                </tr>

                              @endforeach

                              </body>
                             </table>
                             {{$membres->links()}}
                           </div>

                         </div>
                         <div class="col-md-4">
                            <div  class="left-cell-axe">
                            <header>
                              <h5><b>modifier un CV</b></h5>
                            </header>
                              <form method="post" action="{{route('cvs.update',1)}}" enctype="multipart/form-data">
                                <div class="form-group">
                              
                              		{{csrf_field()}}
                                    {{method_field('PUT')}}

                                  <p>
                                    <select class="form-control" name="nom">


                                     @foreach( $membres as $membre)

                                        <option>{{$membre->nom}}</option>
			
                               		    @endforeach


                                    </select>
                                    {!!$errors->first('nom','<p class="error">:message</p>')!!}
                                  </p>
                                  <p>
                                     choisi le nouveau CV
                                  </p>
                                  <p>
                                    <input type="file" name="cv"/>
                                    {!!$errors->first('cv','<p class="error">:message</p>')!!}
                                  </p>
                                  <p>
                                     <input type="submit" class="btn btn-info btn-block" value="ajouter"/>
                                  </p>
                                </div>
                              </form>
                            </div>
                          </div>
                           
                         
    </div>
                    

@stop