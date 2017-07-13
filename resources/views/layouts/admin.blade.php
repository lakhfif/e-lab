<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Laboratoire de recherche scientifique</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    
    <link rel="stylesheet" type="text/css" href="{{asset('vendor1/font-awesome-4.7.0/css/font-awesome.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('vendor1/summernote-master/dist/summernote.css')}}">
    
       

    <link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
       @yield('css')
    
  </head>
  <body>
        
        <div class="container-fluid display-table">
            <div class="row display-row">
               
				@include('layouts.partials._menu')

                <div class="col-md-10 col-xs-11 display-cell vertical-top"><!--CONTENU PRINCIPALE-->
                  
                    @include('layouts.partials._header')

                    @yield('content')

                    

                    <div class="row">
                      <footer class="clearfix">
                        <div class="pull-right">&copy; 2017 Made BY ETTALHAOUI & LAKHFIF</div>
                      </footer>
                    </div>
                  
                </div><!--CONTENU PRINCIPALE--><!--CONTENU PRINCIPALE--><!--CONTENU PRINCIPALE-->
              
            </div>
          
        </div>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

      

      <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>

      <script type="text/javascript" src="{{asset('vendor1/summernote-master/dist/summernote.min.js')}}"></script>
      
      @yield('script')

      <script type="text/javascript" src="{{asset('/js/default.js')}}"></script>

  </body>
</html>