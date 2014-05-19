<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>{{$title}}</title>

	<link href='css/bootstrap.min.css' rel='stylesheet' type='text/css'>
	<link href='css/font-awesome.min.css' rel='stylesheet' type='text/css'>
	<link href='css/orderstyle.css' rel='stylesheet' type='text/css'>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,700' rel='stylesheet' type='text/css'>
	
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 pane" id="step0">
				<h1>Dank u!</h1>
				<hr />
				<h3>Betalen</h3>
				{{$order_success}}
				<br />
				<a href="{{url('')}}">Terug naar website</a>
			</div>
		</div>
	</div>
	
	<div id="privacy">
		<a href="">Privacyovereenkomst</a>
	</div>
</body>
</html>