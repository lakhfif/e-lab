
  <div class="row">
                        <header class="clearfix" id="header1">
                          <div class="col-md-5 col-sm-2">
                          <div id="title" class="hidden-xs">
                            <a href="index.html">
                              <h3>Dashboard</h3>
                            </a>
                          </div>
                            <nav class="navbar-default pull-left">
                             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                            </nav>
                          </div>
                          <div class="col-md-7 col-sm-10">
                            <ul class="pull-right clearfix">
                              <li  class="hidden-xs hidden-sm"id="admin-text">Bienvenue dans l'espace admin</li>
                              <li>
                                <a href="#">
                                  <span class="glyphicon glyphicon-envelope" ></span>
                                  <span class="label label-message">4</span>
                                </a>
                              </li>
                              <li>
                              <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span>logOut</span>
                                            <span class="glyphicon glyphicon-log-in" ></span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                              
                              </li>
                            </ul>
                          </div>
                        </header>
                    </div>