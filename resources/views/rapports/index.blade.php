@extends('layouts.admin')


@section('content')

<div class="row">
                         <div class="col-md-4">
                            <div  class="left-cell-axe">
                            <header>
                              <h5><b>ajouter un rapport</b></h5>
                            </header>
                              <form method="post" action="{{route('rapports.store')}}" enctype="multipart/form-data">
                               {{ csrf_field() }}
                                <div class="form-group">
                                  <p>
                                    <label> nom du rapport</label>
                                    <textarea class="form-control" rows="2" name="nom" required></textarea>
                                  </p>
                                  <p>
                                    <label> importer le rapport(pdf)</label>
                                    <input type="file" name="document" required>
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
                               <h5><b>Rapports</b></h5>
                             </header>
                             <table class="table table-striped">
                               <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nom</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <body>
                                 @foreach($rapports as $rapport)
                                  <tr>
                                  <td>{{$rapport->id}}</td>
                                  <td>{{$rapport->nom}}</td>
                                  <td class="" >
                                    <a href="{{route('rapports.show',$rapport)}}" class="btn btn-sm btn-success ">
                                       <span class="glyphicon glyphicon-eye-open"></span>
                                       
                                    </a>
      
                                    <button type="button"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal-{{$rapport->id}}">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        
                                      </button>

                                      <div class="modal fade validation" id="myModal-{{$rapport->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <h4 class="modal-title" id="myModalLabel">modifier un rapport</h4>
                                            </div>
                                            <div class="modal-body">
                                              <div  class="">
                                                
                                                  <form method="post" action="{{route('rapports.update',$rapport)}}" id="update">
                                                  
                                                   {{ csrf_field() }}
                                                   {{method_field('PUT')}}
                                                    <div class="form-group">
                                                      <p>
                                                        <label> nom du rapport</label>
                                                        <textarea name="nom" class="form-control" rows="2" required>{{$rapport->nom}}</textarea>
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


                                    <form action="{{route('rapports.destroy',$rapport)}}" method="post" class="inline-block" onsubmit="return confirm('Vous êtes sûr ?')">
                                      {{csrf_field()}}
                                      {{method_field('DELETE')}}
                                      <button type="submit" class="btn btn-sm btn-danger">
                                       <span class="glyphicon glyphicon-trash"></span>
                                        
                                      </button>
                                    </form>
                                    
                                  </td>
                                 </tr>
                                 @endforeach
                              </body>
                             </table>
                           </div>
                           {{$rapports->links()}}
                         </div>
                       </div>
                    

@stop


@section('script')

<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.js')}}"></script>

@stop