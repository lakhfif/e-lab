@extends('front.layouts.application')

@section('content')


	<div class="col-md-8 col-sm-12 col-xs-12 left-cell display-cell">
      	   		<div id="pub-recent">

					<header >
			      	  <h2 id="evenemnt-recent">
			      	  	<i class="fa fa-home" aria-hidden="true"></i> 
			      	  	 > Publications > 
			      	  </h2>
			      	</header>

      	   			
			      	
			      	<article>
			      		<header>
			      			<h2>{{$publication->titre}}.</h2>
			      		</header>
			      		<footer>
			      			<small><span class="glyphicon glyphicon-time"></span>&nbsp;publier le : {{$publication->created_at}}</small>
			      		</footer>
			      		<div class="pub-recent-cont">
							
						
						{!!$publication->article!!}

							
			      		</div>
			      	</article>
			      	 
			      	@if($publication->file!=null)
					<hr>
					<div id="publication-pdf">
						<a href="{{asset('/uploads/posts/'.$publication->file)}}">
						<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
						<span >Voir le document</span>
						</a>
					</div>
					
					@endif
			      	

      	   		</div>

				

     </div>


@stop


