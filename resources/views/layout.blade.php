<html> 
	<head>
		<link href="{{ URL::asset('css/app.css')}}" rel="stylesheet">
	</head>
	<body>
	<div class="container">
		
		<ul class="nav nav-pills">
	 		<li ><a href="register">Registrácia</a></li>
	  		<li ><a href="compare">Porovnať</a></li>
	  		<li ><a href="https://github.com/3riik/laravel">GitHub</a></li>
		</ul>
		
		@if (count($errors) > 0)
   		<div class = "alert alert-danger">
     	 	<ul>
	         	@foreach ($errors->all() as $error)
	            <li>{{ $error }}</li>
	         	@endforeach
      		</ul>
   		</div>
		@endif
		@if ( isset($message_success) )
			<p class = "alert alert-success">{{$message_success}}</p>
		@endif
		<div class="content">
			
			@yield('content')
		</div>
	</div>	
		
	</body>

</html>