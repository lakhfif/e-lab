@extends('layouts.admin')


@section('content')

		<div id="dashboard">
                      <div class="row">
                        <div class="col-md-6 dashboard-left">
                          <div class="admin-contenu">
                            <header class="clearfix">
                              <h5 class="pull-left"> {{$publications->count()}} Publications</h5>
                              <a href="{{route('publications.create')}}" class="btn btn-info btn-xs pull-right">ajouter un article</a>
                            </header>
                            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>titre</th>
                                  <th>date</th>
                                  <th>action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($publications as $publication)

                                		<tr>
		                                  <td>{{str_limit($publication->titre,30)}}</td>
		                                   <td>{{$publication->updated_at}}</td>
		                                   <td>
		                                     <a href="{{route('publications.edit',$publication)}}" class="btn btn-sm btn-primary">
			                                  <span class="glyphicon glyphicon-pencil"></span>
			                                </a>
			                                <form action="{{route('publications.destroy',$publication)}}" method="post" class="inline-block" onsubmit="return confirm('Vous êtes sûr ?')">
			                                      {{csrf_field()}}
			                                      {{method_field('DELETE')}}
			                                      <button type="submit" class="btn btn-sm btn-danger">
			                                       <span class="glyphicon glyphicon-remove"></span> 
			                                      </button>
			                                    </form>
		                                 </td>
		                                </tr>

                                @endforeach
                              </tbody>
                            </table>
                            <div class="clearfix">
                              <a href="{{route('publications.index')}}" class="pull-right text-link">voir tous les articles</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 dashboard-right">
                          <div class="admin-contenu">
                            <header class="clearfix">
                              <h5 class="pull-left"> {{$membres->count()}} Membres</h5>
                              
                              <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#myModal">ajouter un membre</button>
                            </header>
                            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>nom</th>
                                  <th>statut</th>
                                  <th>action</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                @foreach($membres as $membre)
									
									            <tr>
	                                  <td>{{$membre->nom}}</td>
	                                   <td>{{$membre->status}}</td>
	                                   <td>
	                                    <!-- Large modal -->
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal-{{$membre->id}}"><span class="glyphicon glyphicon-pencil"></span></button>

                                        <div class="modal fade bs-example-modal-lg validation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal-{{$membre->id}}">
                                          <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                              

                                            <div class="cree-pub">
                                             <form method="post" action="{{route('membres.update',$membre)}}" enctype="multipart/form-data">

                                   

                                                      <div class="row">

                                                          {{csrf_field()}}
                                                          {{method_field('PUT')}}
                                                          

                                                          <div class="col-md-5">
                                                              <div class="form-group">
                                                                  <label>Company</label>
                                                                  <input type="text" class="form-control border-input" disabled placeholder="Company" value="Laboratoire de recherche Mathematique.">
                                                              </div>
                                                          </div>
                                                          <div class="col-md-3">
                                                              <div class="form-group">
                                                                  <label>numero du telephone</label>
                                                                  <input type="text" class="form-control border-input" placeholder="Telephone" name="telephone" value="{{$membre->telephone}}" required>
                                                              </div>
                                                              {!!$errors->first('telephone','<p class="error">:message</p>')!!}
                                                          </div>
                                                          <div class="col-md-4">
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
                                                                  <label>nom</label>
                                                                  <input type="text" class="form-control border-input" placeholder="Nom" name="nom" value="{{$membre->nom}}" required>
                                                              </div>
                                                              {!!$errors->first('nom','<p class="error">:message</p>')!!}
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
                                                                  <label>Status</label>
                                                                  <input type="text" class="form-control border-input" placeholder="Status" name="status"
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
                                                                   @foreach(App\Models\Equipe::all() as $equipe)  
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
			                                       <span id="btn" class="glyphicon glyphicon-remove"></span> 
			                                      </button>
			                                    </form>
	                                 </td>
	                                </tr>

                                @endforeach
                               
                              </tbody>
                            </table>
                            <div class="clearfix">
                              <a href="#" class="pull-right text-link">voir tous le Membres</a>
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="row">
                        <div class="col-md-6 dashboard-left">
                          <div class="admin-contenu">
                            <header class="clearfix">
                              <h5 class="pull-left"> {{$projets->count()}} Projets </h5>
                              <a href="{{route('projets.index')}}" class="btn btn-info btn-xs pull-right">ajouter un projet </a>
                            </header>
                            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>titre</th>
                                  <th>equipe</th>
                                  <th>action</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                @foreach($projets as $projet)
									<tr>
	                                  <td>{{str_limit($projet->nom,30)}}</td>
	                                   <td>{{$projet->equipe->nom}}</td>
	                                   <td>



                                    <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1-{{$projet->id}}">
                                              <span class="glyphicon glyphicon-pencil"></span>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade validation" id="myModal1-{{$projet->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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



	                                    <form action="{{route('projets.destroy',$projet)}}" method="post" class="inline-block" onsubmit="return confirm('Vous êtes sûr ?')">
			                                      {{csrf_field()}}
			                                      {{method_field('DELETE')}}
			                                      <button type="submit" class="btn btn-sm btn-danger">
			                                       <span id="btn" class="glyphicon glyphicon-remove"></span> 
			                                      </button>
			                                    </form>
	                                 </td>
	                                </tr>
                                @endforeach
                                
                               
                              </tbody>
                            </table>
                            <div class="clearfix">
                              <a href="{{route('projets.index')}}" class="pull-right text-link">voir tous les projets</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 dashboard-right">
                          <div class="admin-contenu">
                            <header class="clearfix">
                              <h5 class="pull-left">{{$evenements->count()}} evenemnts</h5>
                              <a href="{{route('evenements.create')}}" class="btn btn-info btn-xs pull-right">ajouter un evenement</a>
                            </header>
                            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>titre</th>
                                  <th>date</th>
                                  <th>action</th>
                                </tr>
                              </thead>
                              <tbody>
                               
                               @foreach($evenements as $evenement)
									 <tr>
	                                  <td>{{str_limit($evenement->titre,20)}}</td>
	                                   <td>{{$evenement->date}}</td>
	                                   <td>
	                                     <a href="{{route('evenements.edit',$evenement)}}" class="btn btn-sm btn-primary">
			                                  <span class="glyphicon glyphicon-pencil"></span>
			                                </a>
			                                <form action="{{route('evenements.destroy',$evenement)}}" method="post" class="inline-block" onsubmit="return confirm('Vous êtes sûr ?')">
			                                      {{csrf_field()}}
			                                      {{method_field('DELETE')}}
			                                      <button type="submit" class="btn btn-sm btn-danger">
			                                       <span class="glyphicon glyphicon-remove"></span> 
			                                      </button>
			                                    </form>
	                                 </td>
	                                </tr>
                               @endforeach
                                
                              </tbody>
                            </table>
                            <div class="clearfix">
                              <a href="{{route('evenements.index')}}" class="pull-right text-link">voir tous les evenements</a>
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-6 dashboard-left">
                          <div class="admin-contenu">
                            <header class="clearfix">
                              <h5 class="pull-left"> {{$equipes->count()}} Equipes </h5>
                              <a href="{{route('equipes.index')}}" class="btn btn-info btn-xs pull-right">ajouter une equipe </a>
                            </header>
                            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Nom equipe</th>
                                  <th>Personne</th>
                                  <th>action</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                @foreach($equipes as $equipe)
									
									<tr>
	                                  <td>{{$equipe->nom}}</td>
	                                   <td>
	                                   	{{App\Models\Equipe::nombrePersonne($equipe->id)}}
	                                   </td>
	                                   <td>




                                    
                                    <!-- Small modal -->
                                    <!-- Button trigger modal -->
                                      <button type="button"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal2-{{$equipe->id}}">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        
                                      </button>

                                      <!-- Modal -->
                                      <div class="modal fade validation" id="myModal2-{{$equipe->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <h4 class="modal-title" id="myModalLabel">modifier une equipe</h4>
                                            </div>
                                            <div class="modal-body">
                                              <div  class="">
                                                
                                                  <form method="post" action="{{route('equipes.update',$equipe)}}" id="update">
                                                  
                                                   {{ csrf_field() }}
                                                   {{method_field('PUT')}}
                                                    <div class="form-group">
                                                      <p>
                                                        <label> nom de nouveau equipe</label>
                                                        <textarea name="nom" class="form-control" rows="2" required>{{$equipe->nom}}</textarea>
                                                        {!!$errors->first('nom','<p class="error">:message</p>')!!}
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




	                                   <form action="{{route('equipes.destroy',$equipe)}}" method="post" class="inline-block" onsubmit="return confirm('Vous êtes sûr ?')">
			                                      {{csrf_field()}}
			                                      {{method_field('DELETE')}}
			                                      <button type="submit" class="btn btn-sm btn-danger">
			                                       <span class="glyphicon glyphicon-remove"></span> 
			                                      </button>
			                                    </form>
	                                 </td>
	                                </tr>

                                @endforeach
                                
                              </tbody>
                            </table>
                            <div class="clearfix">
                              <a href="{{route('equipes.index')}}" class="pull-right text-link">voir toutes les equipes</a>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      </div>







                            <div class="modal fade bs-example-modal-lg validation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  

                                <div class="cree-pub">
                                 <form method="post" action="{{route('membres.store')}}" enctype="multipart/form-data">

                                   

                                    <div class="row">
                                        {{csrf_field()}}
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Company</label>
                                                <input type="text" class="form-control border-input" disabled placeholder="Company" value="Laboratoire de recherche Mathematique.">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>numero du telephone</label>
                                                <input type="text" class="form-control border-input" placeholder="Telephone" name="telephone" required>

                                            </div>
                                            {!!$errors->first('telephone','<p class="error">:message</p>')!!}
                                        </div>
                                        <div class="col-md-4">
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
                                                <label>nom</label>
                                                <input type="text" class="form-control border-input" placeholder="Nom" name="nom" required>
                                            </div>
                                            {!!$errors->first('nom','<p class="error">:message</p>')!!}
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
                                                <label>Status</label>
                                                <input type="text" class="form-control border-input" placeholder="Status" name="status" required>
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
                                                 @foreach(App\Models\Equipe::all() as $equipe)  
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
                                                <label>Curriculum Vitae(cv)</label>
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

@stop



@section('script')

<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.js')}}"></script>

@stop