@foreach ($traces as $trace)
<div class="panel panel-warning">
  <div class="panel-heading">
  	@if ($trace->cache == '1')
  		<i class='glyphicon glyphicon-flash'></i>
  	@endif
  	{{$trace->title}}
  </div>
  <div class="panel-body">
    
    <b>Template: </b> {{$trace->template}}
  </div>
  <div class="panel-footer">
  	<b>Route: </b> {{$trace->route}}
	  <a href="{{url('traces/change/'.$trace->id)}}" class="pull-right"><i class="glyphicon glyphicon-pencil"></i> Wijzig/Verwijder</a>
  </div>
</div>
@endforeach

<a href="{{url('traces/create')}}" class="btn btn-success btn-xs pull-right">Nieuwe Tracé</a>