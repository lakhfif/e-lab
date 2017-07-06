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
                                    <label> importer le rapport</label>
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
                                  <td>1</td>
                                  <td>{{$rapport->nom}}</td>
                                  <td class="pull-right" >
                                    <a href="{{route('rapports.show',$rapport)}}" class="btn btn-sm btn-success ">
                                       <span class="glyphicon glyphicon-eye-open"></span>
                                       
                                    </a>
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
                    </div>

@stop