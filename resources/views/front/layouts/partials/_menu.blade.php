 <div class="navbar navbar-inverse navbar-static-top" id="header">
      
      <div class="container">
        <div class="row">
            <div class="col-md-9">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

           <div id="navbar" class="collapse navbar-collapse pull-left">
              <ul class="nav navbar-nav">
                
                <li>
                  <a href="{{route('accueil.index')}}">ACCUEIL</a>
                </li>
                 <li>
                  <a href="{{route('publication.index')}}">PUBLICATIONS</a>
                </li>
                 <li>
                  <a href="{{route('membre.index')}}">MEMBRES</a>
                </li>
                 <li>
                  <a href="{{route('evenement.index')}}">EVENEMENTS</a>
                </li>
                <li>
                  <a href="{{route('projet.index')}}">PROJETS</a>
                </li>

              </ul>
            </div>
        </div>

        <div class="col-md-3">
          
          <form class=" hidden-sm hidden-xs navbar-form navbar-left pull-left" id="chercher" action="{{route('search')}}" method="post">
          {{ csrf_field() }}
               <div class='input-group'>
                <input type='text' class="form-control" placeholder="chercher.." name="search"id="search" onkeyup="up()" onkeydown="down()" />
                 <span class="input-group-btn">
                  <button class="btn  btn-default" type="submit"> Go !</button>
                </span>
               </div>
          </form>
        </div>

        </div>
        
      </div>

    </div>