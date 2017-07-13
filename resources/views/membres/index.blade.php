@extends('layouts.admin')



@section('content')
 	 <div id="contenu">
                      <header class="row">
                         <div class="col-md-3">
                           <h4 class="titre-page-membre hidden-xs hidden-sm ">memebre du laboratoire</h4>
                         </div>
                         <div class="col-md-9">
                          <div class="pull-right">
                            
                           <!-- Large modal -->
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">ajouter un membre</button>

                            <div class="modal fade bs-example-modal-lg validation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  

                                <div class="cree-pub">
                                 <form method="post" action="{{route('membres.store')}}" enctype="multipart/form-data">

                                   

                                    <div class="row">
                                        {{csrf_field()}}
                                       
                                        <div class="col-md-6">
                                          <div class="form-group">
                                                <label>nom</label>
                                                <input type="text" class="form-control border-input" placeholder="Nom" name="nom" required>
                                            </div>
                                            {!!$errors->first('nom','<p class="error">:message</p>')!!} 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="email" class="form-control border-input" placeholder="Email" name="email" required>
                                            </div>
                                            {!!$errors->first('email','<p class="error">:message</p>')!!}
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                         <div class="form-group">
                                                <label>numero du telephone</label>
                                                <input type="text" class="form-control border-input" placeholder="Telephone" name="telephone" required>

                                            </div>
                                            {!!$errors->first('telephone','<p class="error">:message</p>')!!}   

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>mot de passe</label>
                                                <input type="password" class="form-control border-input" placeholder="password" name="password" required>
                                            </div>
                                            {!!$errors->first('password','<p class="error">:message</p>')!!}
                                        </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-6">
                                            <div class="form-group">
                                                <label>profession</label>
                                                <input type="text" class="form-control border-input" placeholder="profession" name="status" required>
                                            </div>
                                            {!!$errors->first('status','<p class="error">:message</p>')!!}
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Addresse</label>
                                                <input type="text" class="form-control border-input" placeholder="Addresse" name="adresse" required>
                                            </div>
                                            {!!$errors->first('adresse','<p class="error">:message</p>')!!}
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Equipe</label>
                                                <select class="form-control" name="equipe" required>
                                                 @foreach(App\Models\Equipe::where('etat','=',true)->get() as $equipe)  
                                                  <option value="{{$equipe->nom}}">{{$equipe->nom}}</option>
                                          
                                           @endforeach
                                          </select>
                                            </div>
                                            {!!$errors->first('equipe','<p class="error">:message</p>')!!}
                                        </div>
                                    </div>
                  
                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Curriculum Vitae(format pdf)</label>
                                                <input type="file" name="cv" required/>
                                            </div>
                                            {!!$errors->first('cv','<p class="error">:message</p>')!!}
                                        </div>
                                    </div>
                                   

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>A propos</label>
                                                <textarea rows="5" class="form-control border-input" placeholder="Description ici" name="description" ></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                 <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                </form>
                              </div>
                            </div>
                                                        
                          </div>
                           
                         </div>
                      </header>
                      <div class="membre">
                          <table id="tableau"class="table table-striped">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nom</th>
                                  <th>Profession</th>
                                  <th class="hidden-xs">Email</th>
                                  <th>Telephone</th>
                                  <th>Equipe</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <body>
                                 @foreach($membres as $membre)
									
							               	<tr>
                                  <td>{{$membre->id}}</td>
                                  <td>{{$membre->prenom}} {{$membre->nom}}</td>
                                  <td>{{$membre->status}}</td>
                                  <td class="hidden-xs">{{$membre->email}}</td>
                                  <td>{{$membre->telephone}}</td>
                                  <td>{{$membre->equipe->nom}}</td>
                                  <td >
                                    




                                      <!-- Large modal -->
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal-{{$membre->id}}"><span class="glyphicon glyphicon-pencil"></span>&nbsp;<span>modifier</span></button>

                                        <div class="modal fade bs-example-modal-lg validation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal-{{$membre->id}}">
                                          <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                              

                                            <div class="cree-pub">
                                             <form method="post" action="{{route('membres.update',$membre)}}" enctype="multipart/form-data">

                                   

                                                      <div class="row">

                                                          {{csrf_field()}}
                                                          {{method_field('PUT')}}
                                                          
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                                  <label>nom</label>
                                                                  <input type="text" class="form-control border-input" placeholder="Nom" name="nom" value="{{$membre->nom}}" required>
                                                              </div>
                                                              {!!$errors->first('nom','<p class="error">:message</p>')!!}  

                                                          </div>
                                                          <div class="col-md-6">
                                                              <div class="form-group">
                                                                  <label for="exampleInputEmail1">Email</label>
                                                                  <input type="email" class="form-control border-input" placeholder="Email" name="email"
                                                                  value="{{$membre->email}}" required>
                                                              </div>
                                                              {!!$errors->first('email','<p class="error">:message</p>')!!}
                                                          </div>
                                                      </div>

                                                      <div class="row">
                                                          <div class="col-md-6">
                                                           <div class="form-group">
                                                              <label>numero du telephone</label>
                                                              <input type="text" class="form-control border-input" placeholder="Telephone" name="telephone" value="{{$membre->telephone}}"required>

                                                          </div>
                                                          {!!$errors->first('telephone','<p class="error">:message</p>')!!}   
                                                          </div>
                                                          <div class="col-md-6">
                                                              <div class="form-group">
                                                                  <label>mot de passe</label>
                                                                  <input type="password" class="form-control border-input" placeholder="password" name="password" value="{{$membre->password}}" required>
                                                              </div>
                                                              {!!$errors->first('password','<p class="error">:message</p>')!!}
                                                          </div>
                                                      </div>

                                                      <div class="row">
                                                        <div class="col-md-6">
                                                              <div class="form-group">
                                                                  <label>profession</label>
                                                                  <input type="text" class="form-control border-input" placeholder="profession" name="status"
                                                                  value="{{$membre->status}}" required>
                                                              </div>
                                                              {!!$errors->first('status','<p class="error">:message</p>')!!}
                                                          </div>
                                                          <div class="col-md-6">
                                                              <div class="form-group">
                                                                  <label>Addresse</label>
                                                                  <input type="text" class="form-control border-input" placeholder="Addresse" name="adresse"
                                                                  value="{{$membre->adresse}}"required>
                                                              </div>
                                                              {!!$errors->first('adresse','<p class="error">:message</p>')!!}
                                                          </div>
                                                      </div>


                                                      <div class="row">
                                                          <div class="col-md-12">
                                                              <div class="form-group">
                                                                  <label>Equipe</label>
                                                                  <select class="form-control" name="equipe" required>
                                                                   @foreach(App\Models\Equipe::where('etat','=',true)->get() as $equipe)  
                                                                    <option value="{{$equipe->nom}}">{{$equipe->nom}}</option>
                                                            
                                                             @endforeach
                                                            </select>
                                                              </div>
                                                              {!!$errors->first('equipe','<p class="error">:message</p>')!!}
                                                          </div>
                                                      </div>
                                    
                                                     

                                                      <div class="row">
                                                          <div class="col-md-12">
                                                              <div class="form-group">
                                                                  <label>A propos</label>
                                                                  <textarea rows="5" class="form-control border-input" placeholder="Description ici" name="description" >{{$membre->description}}</textarea>
                                                              </div>
                                                          </div>
                                                      </div>

                                                 <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                              </div>
                                            </div>
                                                                        
                                          </div>
                                           
                                         </div>





                                     <form action="{{route('membres.destroy',$membre)}}" method="post" class="inline-block" onsubmit="return confirm('Vous êtes sûr ?')">
                                      {{csrf_field()}}
                                      {{method_field('DELETE')}}
                                      <button type="submit" class="btn btn-sm btn-danger">
                                       <span class="glyphicon glyphicon-trash"></span>
                                       <span id="btn">supprimer</span> 
                                      </button>
                                    </form>
                                   
                                  </td>
                                </tr>

                                 @endforeach
                                 
                              </body>


                            </table> 
                            <div class="row">
                            <div class="col-md-12">
                                 <span class="pull-left">{{$membres->links()}}</span>
                            </div>
                            </div>
                      </div>

     </div>
@stop



@section('script')

<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.js')}}"></script>

@stop