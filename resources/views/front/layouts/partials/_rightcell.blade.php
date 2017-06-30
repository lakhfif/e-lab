<div class="col-md-4 hidden-xs hidden-sm right-cell display-cell">

      	 <div id="evenement">
		   <header >
	      	  <h1 id="evenemnt-recent">
	      	  	<span class="glyphicon glyphicon-calendar"></span>
	      	  	evenements à venir
	      	  </h1>
	      	  </header>
	      	  	
	      	  	@foreach(App\Models\Evenement::orderBy('id', 'DESC')->take(4)->get() as $evenement)
					<div class="event ">
					<a href=""><h5>
		      	  	{{$evenement->titre}}<br>
		      	  	<small><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;{{$evenement->date}}</small>
		      	    </h5></a>
					</div>
	      	  	@endforeach
	      	    
	      	  
      	 </div>


      	  <div id="projet">
      	  	 <header >
	      	  <h1 id="evenemnt-recent">
	      	  	<span class="glyphicon glyphicon-briefcase"></span>
	      	  	Projets recents
	      	  </h1>
	      	  </header>
	      	  
	      	  	
	      	  @foreach(App\Models\Projet::orderBy('id', 'DESC')->take(5)->get() as $projet)
			  <div class="event ">
			  <a href="#">
               <h5>{{$projet->nom}}</h5>   
              </a>
              </div> 
	      	  @endforeach
            </div>
			  
	      	  </div>

        </div>