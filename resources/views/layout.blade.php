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
		
		<div id="ajaxResponse" class="alert alert-danger hidden"><ul> </ul> </div>

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
	<script src="{{ URL::asset('js/app.js') }}"></script>
	<script src="{{ URL::asset('js/register-ajax.js') }}"></script>
	</body>

</html>