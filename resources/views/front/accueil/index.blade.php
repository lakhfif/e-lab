@extends('front.layouts.application')



@section('content')


	<div class="col-md-8 col-sm-12 col-xs-12 left-cell display-cell">
      	   <header>
      	   		<h1>{{$laboratoire->nom}}</h1>
      	   	</header>

      	   		<div id="description">
      	   			
      	   			{{$laboratoire->description}}
					

      	   		</div>
      	   		<div id="pub-recent">

					<header >
			      	  <h1 id="evenemnt-recent">
			      	  	<span class="glyphicon glyphicon-pencil"></span>
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

						<a href="#">Lire plus...</a>

							
			      		</div>
			      	</article>
			      	<hr>

      	   			@endforeach
			      	
			      	
					
      	   		</div>
      	   		<p class="text-center">

			      		<a href="#" class="btn btn-primary bnt-sm">
			      			<span>Voir tous les publication</span>
			      			<span class="glyphicon glyphicon-arrow-right"></span>
			      		</a>
			      		
			    </p>

     </div>


@stop