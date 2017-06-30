@extends('front.layouts.application')

@section('content')


	<div class="col-md-8 col-sm-12 col-xs-12 left-cell ">
      	   		<div id="pub-recent">

					<header >
			      	  <h2 id="evenemnt-recent">
			      	  	<i class="fa fa-home" aria-hidden="true"></i> 
			      	  	 > Evenements
			      	  </h2>
			      	</header>

      	   			@for($i = 0; $i<count($evenements); $i++)
			      	
			      	<article>
			      		<header>
			      			
			      			
			      		</header>
			      		
			      		
			      		<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-2 col-xs-2 col">
									 <div class=" event-date text-center">
									  <?php 
									  	$date = App\Models\Evenement::getDay($evenements[$i]['date']);
									  	echo $date[2];
									   ?>
									 </div>
									  <div class="event-date-y text-center">
										<?php echo $date[1].'/'.$date[0] ?>
									  </div>
									</div>

									<div class="col-md-10 col-xs-10  event-titre">
									 
										 	<h4>{{$evenements[$i]['titre']}}</h4>
										 	
											<a href="{{route('evenement.show',$evenements[$i]['id'])}}">Lire la suite...</a>
									
									</div>
								</div>
							   </div>
								@if($i+1<count($evenements))
								<div class="col-md-6">
								<div class="row">
									<div class="col-md-2 col-xs-2 col">
									 <div class=" event-date text-center">
									  <?php 
									  	$date = App\Models\Evenement::getDay($evenements[$i+1]['date']);
									  	echo $date[2];
									   ?>
									 </div>
									  <div class="event-date-y text-center">
										<?php echo $date[1].'/'.$date[0] ?>
									  </div>
									</div>

									<div class="col-md-10 col-xs-10 event-titre">
									 
										 	<h4>{{$evenements[$i+1]['titre']}}</h4>
										 	
											<a href="{{route('evenement.show',$evenements[$i+1]['id'])}}">Lire la suite...</a>
									
									</div>
								</div>
							   </div>
							   @endif
							
			      		</div>
			      		
			      	</article>
			      	
			      	 <?php $i++ ?>;

      	   			@endfor
			      	
			      	
					{{$evenements->links()}}
      	   		</div>


     </div>


@stop