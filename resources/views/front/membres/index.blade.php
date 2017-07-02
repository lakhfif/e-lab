@extends('front.layouts.application')

@section('content')


	<div class="col-md-8 col-sm-12 col-xs-12 left-cell ">
      	   		<div id="pub-recent">

					<header >
			      	  <h2 id="evenemnt-recent">
			      	  	<i class="fa fa-home" aria-hidden="true"></i> 
			      	  	 > Membres
			      	  </h2>
			      	</header>

      	   			@for($i = 0; $i<count($membres); $i++)
			      	
			      		
			      		<div class="row">
							<div class="col-md-6">
								<div class="row margin-row">
									<div class="col-md-2 col-xs-2 col-sm-1  col">
									 <div class=" membre-icon text-center">
									  <i class="fa fa-user-circle" aria-hidden="true"></i>
									 </div>
									  
									</div>

									<div class="col-md-10 col-xs-10 col-sm-11 membre-text">
									 
										 	<h4>{{$membres[$i]['nom']}}</h4>
										 	<div class="status">
												{{$membres[$i]['status']}}
											</div>
										 	
											<a href="{{asset('uploads/resume/'.$membres[$i]['cv'])}}">Voir son CV</a>
									
									</div>
								</div>
							   </div>
								@if($i+1<count($membres))
								<div class="col-md-6">
								<div class="row margin-row">
									<div class="col-md-2 col-xs-2 col-sm-1  col">
									 <div class=" membre-icon text-center">
									  <i class="fa fa-user-circle" aria-hidden="true"></i>
									 </div>
									  
									</div>

									<div class="col-md-10 col-xs-10 col-sm-11 membre-text">
									 
										 	<h4>{{$membres[$i+1]['nom']}}</h4>
										 	<div class="status">
												{{$membres[$i+1]['status']}}
											</div>
										 	
											<a href="{{asset('uploads/resume/'.$membres[$i+1]['cv'])}}">Voir son CV</a>
									
									</div>
								</div>
							   </div>
							   @endif
							
			      		</div>
			      	
			      	
			      	 <?php $i++ ?>

      	   			@endfor
			      	
			      	
					{{$membres->links()}}
      	   		</div>


     </div>


@stop