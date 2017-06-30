@extends('front.layouts.application')

@section('content')


	<div class="col-md-8 col-sm-12  col-xs-12 left-cell ">
      	   		<div id="pub-recent">

					<header >
			      	  <h2 id="evenemnt-recent">
			      	  	<i class="fa fa-home" aria-hidden="true"></i> 
			      	  	 > Evenements > 
			      	  </h2>
			      	</header>

      	   			
			      	
			      	<article>
			      		<header>
			      			<h2>{{$evenement->titre}}.</h2>
			      			<b>commence Le : </b><h5 class="event-detail">{{$evenement->date}}</h5>&nbsp;&nbsp;
			      			<b>Lieu : </b><h5 class="event-detail">{{$evenement->lieu}}</h5>
			      		</header>
			      		@if($evenement->image!=null)
						  <div class="row">
			      			<div class="col-md-12 text-center">
			      				<img class="img-thumbnail" id="image-event"src="{{asset('/uploads/event/'.$evenement->image)}}">
			      			</div>
			      		  </div>
			      		@endif
			      		<div class="row">
							<div class="col-md-12">
								{!!$evenement->description!!}
							</div>	
							
			      		</div>
			      		
			      	</article>

      	   			
      	   		</div>


     </div>


@stop