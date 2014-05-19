<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>

	<link href='{{asset('css/bootstrap.min.css')}}' rel='stylesheet' type='text/css'>
	
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,700' rel='stylesheet' type='text/css'>
</head>
	<body>
		<div class="container">
			<div class="col-md-12" style="text-align:center;">
				<h1 style="font-size:70px;">@yield('title')</h1>
				<a href="{{url('')}}">Terug naar de website</a>
			</div>
			<div class="col-md-8 col-md-offset-2">
				@yield('content')
			</div>
		</div>
	</body>
</html>