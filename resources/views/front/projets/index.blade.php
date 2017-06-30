@extends('front.layouts.application')

@section('content')


	<div class="col-md-8 col-sm-12 col-xs-12 left-cell ">
      	   		<div id="pub-recent">

					<header >
			      	  <h2 id="evenemnt-recent">
			      	  	<i class="fa fa-home" aria-hidden="true"></i> 
			      	  	 > Projets
			      	  </h2>
			      	</header>

      	   			@for($i = 0; $i<count($projets); $i++)
			      	
			      	<article>
			      		<header>
			      			
			      			
			      		</header>
			      		
			      		
			      		<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-10 col-xs-10  event-titre width-col">
									 
										 	<h4>{{$projets[$i]['nom']}}</h4>
										 	
											<a href="{{route('projet.show',$projets[$i]['id'])}}">Lire la suite...</a>
									
									</div>
								</div>
							   </div>
								@if($i+1<count($projets))
								<div class="col-md-6">
								<div class="row ">
									<div class="col-md-10 col-xs-10 event-titre width-col">
									 
										 	<h4>{{$projets[$i+1]['nom']}}</h4>
										 	
											<a href="{{route('projet.show',$projets[$i+1]['id'])}}">Lire la suite...</a>
									
									</div>
								</div>
							   </div>
							   @endif
							
			      		</div>

			      		
			      	</article>
			      	
			      	 <?php $i++ ?>;

      	   			@endfor
			      	
			      	
					{{$projets->links()}}
      	   		</div>


     </div>


@stop