@extends('front.layouts.application')

@section('content')


	<div class="col-md-8 col-sm-12  col-xs-12 left-cell ">
      	   		<div id="pub-recent">

					<header >
			      	  <h2 id="evenemnt-recent">
			      	  	<i class="fa fa-home" aria-hidden="true"></i> 
			      	  	 > Projets > 
			      	  </h2>
			      	</header>
			      	
			      	<article>
			      		<header>
			      			<h2>{{$projet->nom}}.</h2>
			      		</header>
			      		
			      		<div class="row">
							<div class="col-md-12">
								{!!$projet->description!!}
							</div>	
							
			      		</div>
			      		
			      	</article>

      	   			
      	   		</div>


     </div>


@stop