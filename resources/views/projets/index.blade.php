@extends('layouts.admin')



@section('content')

	 <div class="row">
                         <div class="col-md-4">
                            <div  class="left-cell-axe">
                            <header>
                              <h5><b>ajouter un projet</b></h5>
                            </header>
                              <form method="post" action="{{route('projets.store')}}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                                <div class="form-group">
                                  <p>
                                    <label> nom de votre nouveau projet</label>
                                    <textarea class="form-control" rows="1" name="nom" required></textarea>
                                    {!!$errors->first('nom','<p class="error">:message</p>')!!}
                                  </p>
                                   <p>
                                    <label> Description</label>
                                    <textarea class="form-control" rows="4" name="description"></textarea>

                                  </p>
                                  <p>
                                    <label>l'equipe</label>
                                     <select class="form-control" name="equipe">
                                       @foreach(App\Models\Equipe::all() as $equipe)  
                                                  <option value="{{$equipe->nom}}">{{$equipe->nom}}</option>
                                          
                                        @endforeach
                                    </select>
                                    {!!$errors->first('equipe','<p class="error">:message</p>')!!}
                                  </p>
                                  <p>
                                     <input type="submit" class="btn btn-info btn-block" value="ajouter" />
                                  </p>
                                </div>
                              </form>
                            </div>
                          </div>
                           
                         <div class="col-md-8 right-cell">
                           <div  class="left-cell-axe" >
                             <header>
                               <h5><b>Projets</b></h5>
                             </header>
                             <table class="table table-striped">
                               <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nom</th>
                                  <th>equipe</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <body>
                                @foreach($projets as $projet)

                                         <tr>
                                          <td>{{$projet->id}}</td>
                                          <td>{{$projet->nom}}</td>
                                          <td>{{$projet->equipe->nom}}</td>
                                          <td >
                                           <form action="{{route('projets.destroy',$projet)}}" method="post" class="inline-block" onsubmit="return confirm('Vous êtes sûr ?')">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-xs btn-danger">
                                             <span class="glyphicon glyphicon-trash"></span>
                                             <span id="btn">supprimer</span> 
                                            </button>
                                          </form>

                                          <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal-{{$projet->id}}">
                                              <span class="glyphicon glyphicon-pencil"></span>
                                              <span>modifier</span>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade validation" id="myModal-{{$projet->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">modifier une equipe</h4>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div  class="">
                                                      
                                                        <form method="post" action="{{route('projets.update',$projet)}}" enctype="multipart/form-data">
                                                          {{ csrf_field() }}
                                                          {{method_field('PUT')}}
                                                            <div class="form-group">
                                                              <p>
                                                                <label> nom du projet</label>
                                                                <textarea class="form-control" rows="1" name="nom" required></textarea>
                                                                {!!$errors->first('nom','<p class="error">:message</p>')!!}
                                                              </p>
                                                               <p>
                                                                <label> Description</label>
                                                                <textarea class="form-control" rows="4" name="description"></textarea>

                                                              </p>
                                                              <p>
                                                                <label>l'equipe</label>
                                                                 <select class="form-control" name="equipe">
                                                                   @foreach(App\Models\Equipe::all() as $equipe)  
                                                                              <option value="{{$equipe->nom}}">{{$equipe->nom}}</option>
                                                                      
                                                                    @endforeach
                                                                </select>
                                                                {!!$errors->first('equipe','<p class="error">:message</p>')!!}
                                                              </p>
                                                              
                                                            </div>
                                                          
                                                        
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">modifier</button>
                                                  </div>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                          </td>
                                        </tr>

                                @endforeach
                              </body>
                             </table>
                             {{$projets->links()}}
                           </div>
                         </div>
                       </div>

@stop


@section('script')

<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.js')}}"></script>

@stop