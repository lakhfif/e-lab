@extends('layouts.admin')



@section('content')

    <div id="contenu">
                       <header class="clearfix">
                         <h4 class="titre-page pull-left hidden-xs">tous les evenements</h4>
                         <a href="{{route('evenements.create')}}" class="btn btn-sm btn-info pull-right">
                           <span>creé un evenement</span>
                         </a>

                       </header>
                       <div class="cree-pub">
                          <div class="row search-row">
                            <div class="col-md-12">
                                 <form method="post" action="#">
                                    <div class='input-group'>
                                        <input type='text' class="form-control" placeholder="search.."/>
                                        <span class="input-group-btn">
                                            <button class="btn  btn-info" type="submit"> Go !</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                          </div>
                          

                          @foreach($evenements as $evenement)
                              
                              <div class="row ">
                                <div class="  col-xs-2 col-sm-1 col-md-1">
                                  <label class="label label-md label-success">active</label>
                                </div>
                                <div class="col-xs-10 col-sm-7 col-md-8 article-ligne">
                                  <p>
                                    {{$evenement->titre}}
                                  </p>
                                  <small> Le : {{$evenement->date}}</small>
                                </div>
                                <div class="col-xs-10 col-sm-4 col-md-3 col-xs-offset-2 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
                                  <div class="action-article">
                                    <a href="{{route('evenements.edit',$evenement)}}" class="btn btn-xs btn-default">
                                      <span class="glyphicon glyphicon-pencil"></span>
                                      <span>modifier</span>
                                    </a>
                                    <form action="{{route('evenements.destroy',$evenement)}}" method="post" class="inline-block" onsubmit="return confirm('Vous êtes sûr ?')">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-xs btn-default">
                                             <span class="glyphicon glyphicon-trash"></span>
                                             <span id="btn">supprimer</span> 
                                            </button>
                                          </form>
                                        </tr>
                                  </div>
                                </div>
                              </div>
                              <hr>
                          @endforeach
                            
                           {{$evenements->links()}}  
                       </div>

                    </div>

@stop