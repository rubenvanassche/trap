<link href='css/timeline.css' rel='stylesheet' type='text/css'>
<ul class="timeline">
<?php 
$parser = new Timeline; 
$ticktock = 1;
?>

@foreach($timeline as $item)
	<li <?php if($ticktock == 1){$ticktock = 0;}else{$ticktock = 1;echo 'class="timeline-inverted"';} ?>>
		<div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
		<div class="timeline-panel">
			<div class="timeline-heading">
				<h4 class="timeline-title">{{$item->title}} <a class="pull-right" href="{{url('timeline/delete/'.$item->id)}}"><i class="glyphicon glyphicon-remove"></i></a></h4>
				<p><small class="text-muted"><i class="glyphicon glyphicon-calendar"></i> {{$item->date}}</small></p>
			</div>
			<div class="timeline-body">
				{{$parser->getContent($item->id)}}
			</div>
		</div>
	</li>
@endforeach
</ul>


<a href="{{url('timeline/create')}}" class="btn btn-success btn-xs pull-right">Nieuw Bericht</a>