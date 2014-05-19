<table class="table table-hover table-responsive">
  <thead>
    <tr>
      <th>Controleur</th>
      <th>Bedrag</th>
      <th>Datum</th>
      <th><i class="glyphicon glyphicon-pencil"></i></th>
      <th><i class="glyphicon glyphicon-remove"></i></th>
    </tr>
  </thead>
  <tbody>
	  @foreach ($checkers as $checker)
	  	<tr>
	  		<td>{{$checker->user}}</td>
		  	<td>{{$checker->payed}}</td>
		  	<td>{{$checker->date}}</td>
		  	@if ($checker->user_id == Auth::user()->id)
		  	<td><a href="{{url('orders/changechecker/'.$orderID.'/'.$checker->id)}}"><i class="glyphicon glyphicon-pencil"></i></a></td>
		  	<td><a href="{{url('orders/deletechecker/'.$orderID.'/'.$checker->id)}}"><i class="glyphicon glyphicon-remove"></i></a></td>
		  	@else
		  	<td></td>
		  	<td></td>
		  	@endif
	  	</tr>
	  @endforeach
  </tbody>
</table>

<a href="{{url('orders/createchecker/'.$orderID)}}" class="btn btn-success btn-xs pull-right">Nieuwe Betaling</a>