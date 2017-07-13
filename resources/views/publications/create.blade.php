@extends('layouts.admin')



@section('content')
	
	<div id="contenu">
                       <header>
                         <h4 class="titre-page">cree une publication</h4>
                       </header>
                       <div class="cree-pub">
                         <form method="post" action="{{route('publications.store')}}" enctype="multipart/form-data">
                           <div class="form-group">
                           {{csrf_field()}}
                              <label class="sr-only">titre</label> 
                              <input type="text" class="form-control" name="titre" id="titre" placeholder="titre.." >
                              {!!$errors->first('titre','<p class="error">:message</p>')!!}
                           </div>
                           <div class="form-group">
                              <label class="sr-only"></label>  
                           </div>
                          <div class="form-group">
                              <label class="sr-only">article</label> 
                              <textarea class="form-control summernote" name="article"></textarea>
                              {!!$errors->first('article','<p class="error">:message</p>')!!}
                          </div> 
                          
                            <div class="form-group">
                              <label class="sr-only"></label> 
                              <input type="file" name='file'>
                           </div>
                           <div class="form-group">
                              <input type="submit" value="Publier"class="btn btn-info">
                           </div>
                         </form>
                       </div>
    </div>

@stop

@section('script')

	<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

@stop