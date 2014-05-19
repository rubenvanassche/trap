<table class="table table-hover table-responsive">
  <thead>
    <tr>
      <th>Titel</th>
      <th>Beschrijving</th>
      <th>Prijs</th>
      <th>Beschikbaarheid</th>
      <th><i class="glyphicon glyphicon-pencil"></i></th>
      <th><i class="glyphicon glyphicon-remove"></i></th>
    </tr>
  </thead>
  <tbody>
	  @foreach ($products as $product)
	  	<tr>
		  	<td>{{$product->title}}</td>
		  	<td>{{$product->description}}</td>
		  	<td>€{{$product->price}}</td>
		  	<td>{{$product->avaible}}</td>
		  	<td><a href="{{url('inventory/change/'.$product->id)}}"><i class="glyphicon glyphicon-pencil"></i></a></td>
		  	<td><a href="{{url('inventory/delete/'.$product->id)}}"><i class="glyphicon glyphicon-remove"></i></a></td>
	  	</tr>
	  @endforeach
  </tbody>
</table>

<a href="{{url('inventory/create')}}" class="btn btn-success btn-xs pull-right">Nieuw Product</a>