@foreach($sponsors as $sponsor)
<div class="col-md-4">
	<div class="thumbnail">
		<img src="{{$sponsor->file}}" alt="...">
		<div class="caption">
			<h3>{{$sponsor->name}}</h3>
			<p><a href="{{url('sponsors/delete/'.$sponsor->id)}}" class="btn btn-danger">Verwijder</a></p>
		</div>
	</div>
</div>
@endforeach

<div class="row">
<div class="col-md-12">
	<a href="{{url('sponsors/create')}}" class="btn btn-success btn-xs pull-right">Nieuwe Sponsor</a>
</div>