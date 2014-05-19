<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{ HTML::style('css/bootstrap.admin.css') }}
    {{ SirTrevorJs::stylesheets()}}
    <title>{{$title or ''}}</title>
  </head>
 
  <body>
    <div class="container">
    	<div class="row">
    		@if (isset($hideAdmin) == false)
    		<div class="col-md-6">
		    	<h1 style="font-size:80px;">{{Orderer::name()}}</h1>
    		</div>
		    <div class="col-md-6" style="margin-top:80px;">
		    	<ul class="nav nav-pills pull-right">
				  <li><a href="{{url('admin')}}">Dashboard</a></li>
				  <li><a href="{{url('admin/sections')}}">Secties</a></li>
				  <li><a href="{{url('orders')}}">Bestellingen</a></li>
				  <li class="dropdown">
			        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Voorkeuren <span class="caret"></span></a>
			        <ul class="dropdown-menu" role="menu">
			        	<li><a href="{{url('admin/generalpreferences')}}">Algemeen</a></li>
			        	<li><a href="{{url('admin/emails')}}">Emails</a></li>
			        	<li class="divider"></li>
			        	<li><a href="{{url('timeline')}}">Tijdslijn</a></li>
			        	<li><a href="{{url('sponsors')}}">Sponsors</a></li>
			        	<li class="divider"></li>
			        	<li><a href="{{url('user')}}">Gebruikers</a></li>
			        	<li><a href="{{url('traces')}}">Tracés</a></li>
			        	<li><a href="{{url('inventory')}}">Producten</a></li>
			        	<li class="divider"></li>
			        	<li><a href="{{url('admin/about')}}">Over Orderer</a></li>
			        </ul>
			      </li>
				  <li><a href="{{ url('user/logout')}}"><i class="glyphicon glyphicon-log-out"></i></a></li>
				</ul>
		    </div>
		    <div class="col-md-12">
		    	<hr />
		    </div>
		    @endif
		    <div class="col-md-12">
		    	<h3 class="pull-right">{{$title or ''}}</h3>
		    </div>
		    <div class="col-md-12">
		        @if(Session::has('message'))
		            <div class="alert alert-info">{{ Session::get('message') }}</div>
		        @endif
    		</div>
    	</div>
        
        {{ $content }}
    </div>
  </body>
  {{ HTML::script('js/jquery.min.js') }}
  {{ HTML::script('js/bootstrap.min.js') }}
  {{ SirTrevorJs::scripts() }}
  <script>
	  new SirTrevor.Editor({ el: $('.sir-trevor-area') });
	</script>
</html>