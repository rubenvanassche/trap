<table class="table table-hover table-responsive">
  <thead>
    <tr>
      <th>ID</th>
      <th>Naam</th>
      <th>Email</th>
      <th>Code</th>
      <th>Betaald</th>
      <th>Betalingen</th>
      <th><i class="glyphicon glyphicon-pencil"></i></th>
      <th><i class="glyphicon glyphicon-remove"></i></th>
    </tr>
  </thead>
  <tbody>
	  @foreach ($orders as $order)
	  	<tr>
	  		<td>{{$order->id}}</td>
		  	<td>{{$order->firstname.' '.$order->lastname}}</td>
		  	<td>{{$order->email}}</td>
		  	<td>{{$order->id.$order->firstname.$order->lastname}}</td>
		  	<td>{{Order::checkedField($order->id)}}</td>
		  	<td>{{Order::checkersField($order->id)}}</td>
		  	<td><a href="{{url('orders/change/'.$order->id)}}"><i class="glyphicon glyphicon-pencil"></i></a></td>
		  	<td><a href="{{url('orders/delete/'.$order->id)}}"><i class="glyphicon glyphicon-remove"></i></a></td>
	  	</tr>
	  @endforeach
  </tbody>
</table>

<a href="{{url('orders/create')}}" class="btn btn-success btn-xs pull-right">Nieuwe Bestelling</a>