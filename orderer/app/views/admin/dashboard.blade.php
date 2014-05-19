<?php
function randomColor(){
	$colors = array('red', 'green', 'blue', '');
	return $colors[array_rand($colors, 1)];
}
?>
<style>
.dashboardwidget{
	height: 100px;
	background-color: #e99002;
	color: white;
	border-bottom: 4px #d08002 solid;
	margin-bottom: 15px;
}

.dashboardwidget a{
	color: white;
	text-decoration: underline;
}
.dashboardwidget .title{
	font-weight: bold;
	font-size: 50px;
}
.dashboardwidget.blue{
	background-color: #5bc0de;
	border-bottom-color:  #3db5d8;
}
.dashboardwidget.red{
	background-color: #f04124;
	border-bottom-color:  #ea2f10;
}
.dashboardwidget.green{
	background-color: #43ac6a;
	border-bottom-color:  #3c9a5f;
}

</style>

<div class="col-md-12 dashboardwidget {{randomColor()}}">
	<div class="title">
		{{$amountOrders}} Bestelling(en)
	</div>
	<div class="info">
		<a href="{{url('orders')}}">Meer info</a>
	</div>
</div>

@foreach($amountInventory as $product => $sold)
	<div class="col-md-12 dashboardwidget {{randomColor()}}">
		<div class="title">
			{{$sold}} {{$product}}
		</div>
		<div class="info">
			<a href="{{url('orders')}}">Meer info</a>
		</div>
	</div>
@endforeach

<div class="col-md-12 dashboardwidget {{randomColor()}}">
	<div class="title">
		{{$amountUsers}} Gebruiker(s)
	</div>
	<div class="info">
		<a href="{{url('user')}}">Meer info</a>
	</div>
</div>

<div class="col-md-12 dashboardwidget {{randomColor()}}">
	<div class="title">
		{{$amountSections}} Sectie(s)
	</div>
	<div class="info">
		<a href="{{url('admin/sections')}}">Meer info</a>
	</div>
</div>
