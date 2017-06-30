@extends('front.layouts.application')

@section('content')


	<div class="col-md-8 col-sm-12 col-xs-12 left-cell display-cell">
      	   		<div id="pub-recent">

					<header >
			      	  <h2 id="evenemnt-recent">
			      	  	<i class="fa fa-home" aria-hidden="true"></i> 
			      	  	 > Publications
			      	  </h2>
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
			      	
			      	
					{{$publications->links()}}
      	   		</div>


     </div>


@stop