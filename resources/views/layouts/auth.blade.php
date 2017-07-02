<!DOCTYPE html>
<html>
<head>
<title>

</title>
<style type="text/css">
	.header h2{
        font-family:  eras, "Century Gothic", verdana, sans-serif;
	}
	.login{
		margin-top: 70px;

	}
	.header{
		background-color: #003569;
		color:white;
		padding: 20px;
		border-bottom: 2px solid #bbb;
		
	}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">

 <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

</head>
<body>
	<div class="container-fluid header text-center hidden-xs"><h2>Laboratoire de recherche scientifique-ENSA</h2></div>
	 @yield('content')
</body>
</html>