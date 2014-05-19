<table class="table table-hover table-responsive">
  <thead>
    <tr>
      <th>ID</th>
      <th>Voornaam</th>
      <th>Achternaam</th>
      <th>Email</th>
      <th><i class="glyphicon glyphicon-pencil"></i></th>
      <th><i class="glyphicon glyphicon-remove"></i></th>
    </tr>
  </thead>
  <tbody>
	  @foreach ($users as $user)
	  	<tr>
		  	<td>{{$user->id}}</td>
		  	<td>{{$user->firstname}}</td>
		  	<td>{{$user->lastname}}</td>
		  	<td>{{$user->email}}</td>
		  	<td><a href="{{url('user/change/'.$user->id)}}"><i class="glyphicon glyphicon-pencil"></i></a></td>
		  	<td><a href="{{url('user/delete/'.$user->id)}}"><i class="glyphicon glyphicon-remove"></i></a></td>
	  	</tr>
	  @endforeach
  </tbody>
</table>

<a href="{{url('user/register')}}" class="btn btn-success btn-xs pull-right">Nieuwe Gebruiker</a>