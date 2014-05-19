<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>{{$title}}</title>

	<link href='css/bootstrap.min.css' rel='stylesheet' type='text/css'>
	<link href='css/font-awesome.min.css' rel='stylesheet' type='text/css'>
	<link href='css/orderstyle.css' rel='stylesheet' type='text/css'>
	
	<script src="js/jquery.min.js"></script>
	
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 pane" id="step0">
				<h1>Bestellen</h1>
				<a href="{{url('voorwaarden')}}">Info fiscale atesten</a>
				<hr />
				{{$orderform}}
			</div>
		</div>
	</div>
	
	<div id="privacy">
		<a href="{{url('privacy')}}">Privacyovereenkomst</a>
	</div>
	
	<script>
		$('#anonymi').click(function(){
		    if(this.checked) {
		        $('#websitename').fadeOut();
		    }else{
			    $('#websitename').fadeIn();
		    }
		});
	</script>
</body>
</html>