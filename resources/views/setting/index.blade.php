@extends('layouts.admin')


@section('content')
	
	<div id="contenu">
                       <header class="clearfix">
                         <h4 class="titre-page pull-left ">Setting</h4>
                         
						<!-- Button trigger modal -->
						<span class="pull-right clearfix setting">
							
								
							<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
							  Ajouter un admin
							</button>
						
							
						
								<button type="button" class="btn btn-primary btn-sm  password" data-toggle="modal" data-target="#myModal1">
								  changer mot de passe
								</button>
							
						</span>



                       </header>
                       <div class="cree-pub">
                          <form method="post" action="{{route('settings.update',$laboratoire)}}" enctype="multipart/form-data">
                                    

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                                <label>nom</label>
                                                <input type="text" class="form-control border-input" value="{{$laboratoire->nom}}" name="nom">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>adresse</label>
                                                <input type="text" class="form-control border-input" value="{{$laboratoire->adresse}}" name="adresse" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>telephone</label>
                                                <input type="text" class="form-control border-input" value="{{$laboratoire->telephone}}" name="telephone">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                    	<div class="col-md-12">
                                            <div class="form-group">
                                                <label>Directeur</label>
                                                <select class="form-control" name="membre">
	                                            @foreach(App\Models\Membre::all() as $membre)  
	                                                  <option value="{{$membre->nom}}">{{$membre->nom}}</option>
	                                          
	                                           @endforeach
	                                          </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control border-input" rows="7" name="description" >{{$laboratoire->description}}"</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>image du laboratoire</label>
                                                <input type="file" name="image" />
                                            </div>
                                            
                                        </div>
                                    
                                        
                                        
                                    </div>
                                   
                                    <div>
                                        <button type="submit" class="btn btn-info btn-fill">Update Setting</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                       </div>
                    </div>




                    <!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Ajouter admin</h4>
					      </div>
					      <div class="modal-body">
					        

						
						            
						                <div class="panel-heading"></div>
						                <div class="panel-body">
						                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
						                        {{ csrf_field() }}

						                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						                            <label for="name" class="col-md-4 control-label">Name</label>

						                            <div class="col-md-6">
						                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

						                                @if ($errors->has('name'))
						                                    <span class="help-block">
						                                        <strong>{{ $errors->first('name') }}</strong>
						                                    </span>
						                                @endif
						                            </div>
						                        </div>

						                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

						                            <div class="col-md-6">
						                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

						                                @if ($errors->has('email'))
						                                    <span class="help-block">
						                                        <strong>{{ $errors->first('email') }}</strong>
						                                    </span>
						                                @endif
						                            </div>
						                        </div>

						                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						                            <label for="password" class="col-md-4 control-label">Password</label>

						                            <div class="col-md-6">
						                                <input id="password" type="password" class="form-control" name="password" required>

						                                @if ($errors->has('password'))
						                                    <span class="help-block">
						                                        <strong>{{ $errors->first('password') }}</strong>
						                                    </span>
						                                @endif
						                            </div>
						                        </div>

						                        <div class="form-group">
						                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

						                            <div class="col-md-6">
						                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
						                            </div>
						                        </div>

						                        
						                    
						                </div>
						            
						   

					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        <button type="submit" class="btn btn-primary">Save changes</button>
					      </div>
					      </form>
					    </div>
					  </div>
					</div>

					  @include('setting._modal')

@stop


@section('script')

<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
<script type="text/javascript">
@if (count($errors) > 0)
    $('#myModal').modal('show');
@endif
</script>


@stop