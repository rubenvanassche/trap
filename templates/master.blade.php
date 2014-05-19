<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>{{$title}}</title>

	<link href='css/bootstrap.min.css' rel='stylesheet' type='text/css'>
	<link href='css/font-awesome.min.css' rel='stylesheet' type='text/css'>
	<link href='css/timeline.css' rel='stylesheet' type='text/css'>
	<link href='css/style.css' rel='stylesheet' type='text/css'>
	
</head>

<body>
	<div id="header">
		<div id="title">{{Orderer::name()}}</div>
		<div id="menu">
			<ul>
				<li onclick="javascript:scrollTo('#home');" id="startlink">Start</li>
				<li onclick="javascript:scrollTo('#updates');" id="updateslink">Updates</li>
				<li onclick="javascript:scrollTo('#info');" id="infolink">Informatie</li>
				<li onclick="javascript:scrollTo('#help');" id="helplink">Help Ons</li>
				<li onclick="javascript:scrollTo('#merci');" id="mercilink">Merci</li>
			</ul>
		</div>
	</div>
	<div id="headerskewed"></div>
	<div id="home">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					 <div id="status">
						<div id="statusbar">
						  <div></div>
						</div>
						<?php
							$soldStones = Inventory::sold(2)*25;
							$soldStairs = Inventory::sold(3)*125;
							$sold = $soldStairs + $soldStones;
							$completed = ($sold/10000)*100;

							echo '<div id="funded">'.$completed.'% Compleet</div>';
							echo '<style>#statusbar > div {width:'.$completed.'%;}</style>'
						?>
						
					 </div>
				</div>
			</div>
			<div class="row">
				<div id="titles" class="col-md-12">
					<div id="title">{{$frontpage_title}}</div>
					<div id="subtitle">{{$frontpage_subtitle}}</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="updates">
		<div class="container">
			<ul class="timeline">
			<?php 
			$parser = new Timeline;
			$timeline = Timeline::All();
			$ticktock = 1;
			?>
			
			@foreach($timeline as $item)
				<li <?php if($ticktock == 1){$ticktock = 0;}else{$ticktock = 1;echo 'class="timeline-inverted"';} ?>>
					<div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
					<div class="timeline-panel">
						<div class="timeline-heading">
							<h4 class="timeline-title">{{$item->title}}</h4>
							<p><small class="text-muted"><i class="glyphicon glyphicon-calendar"></i> <span class="datum">{{$item->date}}</span></small></p>
						</div>
						<div class="timeline-body">
							{{$parser->getContent($item->id)}}
						</div>
					</div>
				</li>
			@endforeach
			</ul>
		</div>
	</div>
	
	<div id="info">
		<div class="container">
			<div class="row">
				<div class="col-md-6" id="text">
					{{$information_page}}
				</div>
				<div class="col-md-6">
					<div class="thumbnail">
						<img src="img/VZW/plan1.png" alt="...">
						<div class="caption">
							<p>Grondplan <a href="img/VZW/plan1.png"><i class="glyphicon glyphicon-zoom-in pull-right"></i></a></p>
						</div>
					</div>
					<div class="thumbnail">
						<img src="img/VZW/plan2.png" alt="...">
						<div class="caption">
							<p>1ste verdieping <a href="img/VZW/plan2.png"><i class="glyphicon glyphicon-zoom-in pull-right"></i></a></p>
						</div>
					</div>
			</div>
		</div>
	</div>
	<div id="help">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 id="bouwerstitle">Help ons</h3>
					<hr />
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<h2><span class="pull-left">Koop een steen</span><span class="pull-right">€25</span></h2>
					<div class="pull-left buytext">
						{{$buy_stone}}
					</div>
					<div class="buyoption">
						<a href="{{url('order')}}" class="btn btn-danger">Ik wil er één!</a>
						<span class="pull-right">{{Inventory::sold(2)}}/2072 Verkocht</span>
					</div>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-5">
					<h2><span class="pull-right">€150</span><span  class="pull-left">Koop een trede</span></h2>
					<div class="pull-right buytext">
						{{$buy_stair}}
					</div>
					<div class="buyoption">
						<a href="{{url('order')}}" class="btn btn-danger">Ik wil er één!</a>
						<span class="pull-right">{{Inventory::sold(3)}}/41 Verkocht</span>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<h3 id="bouwerstitle">Bouwers</h3>
					<hr />
				</div>
			</div>
			<div class="row bouwers" id="gouden">
				<div class="col-sm-2">
					<i class="fa fa-puzzle-piece"></i>
				</div>
				<div class="col-sm-10">
					<div class="title">Gouden Bouwer</div>
					<div class="content">
						{{$goudenbouwer}}
					</div>
				</div>
			</div>
			<div class="row bouwers" id="zilveren">
				<div class="col-sm-2">
					<i class="fa fa-puzzle-piece"></i>
				</div>
				<div class="col-sm-10">
					<div class="title">Zilveren Bouwer</div>
					<div class="content">
						{{$zilverenbouwer}}
					</div>
				</div>
			</div>
			<div class="row bouwers" id="bronzen">
				<div class="col-sm-2">
					<i class="fa fa-puzzle-piece"></i>
				</div>
				<div class="col-sm-10">
					<div class="title">Bronzen Bouwer</div>
					<div class="content">
						{{$bronzenbouwer}}
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="merci">
		<div class="container">
			<div class="row">
				<div class="col-md-12" id="heart" >
					<i class="glyphicon glyphicon-heart"> </i>
				</div>
			</div>
			<div class="row" id="sponsors">
				@foreach (Order::All() as $order)
					@if ($order->anonymous != '1')
						@if ($order->payed($order->id) == true)
							@if ($order->websitename == '')
							<div class="col-md-4">{{$order->firstname.' '.$order->lastname}}</div>
							@else
							<div class="col-md-4">{{$order->websitename}}</div>
							@endif
						@endif
					@endif
				@endforeach
			</div>
		</div>
	</div>
	<div id="sponsorlogos">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php $sponsors = Sponsor::All(); ?>
					@foreach($sponsors as $sponsor)
						<img class="sponsor" src="{{$sponsor->file}}" alt="{{$sponsor->name}}" />
					@endforeach
				</div>
			</div>
		</div>
	</div>
	
	<div id="privacy">
		<a href="{{url('privacy')}}">Privacyovereenkomst</a>
	</div>
</body>

<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/waypoints.min.js"></script>
<script type="text/javascript" src="js/timeago.js"></script>
<script type="text/javascript" src="js/worker.js"></script>
</html>