@extends('layouts.admin')


@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('css/jquery.datetimepicker.min.css')}}">

@stop


@section('content')

	<div id="contenu">
                       <header>
                         <h4 class="titre-page">cree un evenement</h4>
                       </header>
                       <div class="cree-pub">
                         <form method="post" action="{{route('evenements.store')}} "
                         enctype="multipart/form-data">
                         {{ csrf_field() }}
                           <div class="form-group">
                              <label class="sr-only">titre</label> 
                              <input type="text" class="form-control" id="titre" placeholder="titre.." name="titre" required>
                               
                              {!!$errors->first('titre','<p class="error">:message</p>')!!}
                               
                           </div>
                           <div class="form-group">
                              <label class="sr-only"></label> 
                              <input type="text" class="form-control" id="lieu" placeholder="Lieu.." name="lieu"> 
                           </div>
                          <div class="form-group">
                              <label class="sr-only">article</label> 
                              <textarea class="form-control summernote" name="description"></textarea>
                          </div> 
                          
                           	<div class="form-group">
                                    <div class='input-group date'>
                                        <input type='text' class="form-control" id='datetimepicker1' placeholder="date d'evenement" name="date"/ required>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                    {!!$errors->first('date','<p class="error">:message</p>')!!}
                            </div>
                           
                            <div class="form-group">
                              <label >image d'evenement</label> 
                              <input type="file" name="image">
                           </div>
                           <div class="form-group">
                              <input type="submit" value="Publier"class="btn btn-info">
                           </div>
                         </form>
                       </div>
                    </div>

@stop



@section('script')
	  
	  
	   <script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
	   <script type="text/javascript" src="{{asset('/js/jquery.datetimepicker.full.js')}}"></script>
      
      <script type="text/javascript" src="{{asset('vendor1/summernote-master/dist/summernote.min.js')}}"></script>

      <script type="text/javascript">
			    $(function () {
				   $('#datetimepicker1').datetimepicker();
				
				});

		</script>
     

@stop