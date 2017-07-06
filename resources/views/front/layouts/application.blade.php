<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="{{asset('vendor1/font-awesome-4.7.0/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/front.css')}}">
   
  </head>
  <body>
        
        
    @include('front.layouts.partials._menu')
    
    <div class="container display-table">
    <div  class="row contenu display-row">

      	
      @yield('content')      



       @include('front.layouts.partials._rightcell')



    </div>
					
    	
    </div>


            @include('front.layouts.partials._footer')
      
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/search.js')}}"></script>
      @yield('script')
     
      

  </body>
</html>