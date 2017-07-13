@extends('front.layouts.application')



@section('content')


	<div class="col-md-8 col-sm-12 col-xs-12 left-cell display-cell">
      	   <header>
      	   		@if($laboratoire)
				  <h1>{{$laboratoire->nom}}</h1>
      	   		@endif
      	   	</header>

      	   		<div id="description">
      	   			
      	   			@if($laboratoire)
					  {{$laboratoire->description}}
      	   			@endif
					
      	   		</div>
      	   		<div id="pub-recent">

					<header >
			      	  <h1 id="evenemnt-recent">
			      	  	
			      	  	Derniéres Publications
			      	  </h1>
			      	</header>

      	   			@foreach($publications as $publication)
			      	
			      	<article>
			      		<header>
			      			<h2>{{$publication->titre}}.</h2>
			      		</header>
			      		<footer>
			      			<small><span class="glyphicon glyphicon-time"></span>&nbsp;publier le : {{$publication->created_at}}</small>
			      		</footer>
			      		<div class="pub-recent-cont">
							
						
						{!!App\Models\Publication::readMoreHelper($publication->article)!!}

						<a href="{{route('publication.show',$publication)}}">Lire plus...</a>

							
			      		</div>
			      	</article>
			      	<hr>

      	   			@endforeach
			      	
			      	
					
      	   		</div>
      	   		<p class="text-center">

			      		<a href="{{route('publication.index')}}" class="btn btn-primary">
			      			<span>Voir toutes les publications</span>
			      			
			      		</a>
			      		
			    </p>

     </div>


@stop