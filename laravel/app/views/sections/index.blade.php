@foreach ($sections as $section)
<div class="panel panel-primary">
  <div class="panel-heading">{{$section->title}} <span style="color:#FFDC00;" class="pull-right">@{{$<?php echo $section->caller; ?>}}</span>
  </div>
  <div class="panel-body">
    {{ SirTrevorJs::render($section->content) }}
  </div>
  <div class="panel-footer">{{User::find($section->user_id)->firstname." ".User::find($section->user_id)->lastname}}
	  <a href="{{url('admin/changesection/'.$section->id)}}" class="pull-right"><i class="glyphicon glyphicon-pencil"></i> Wijzig/Verwijder</a>
  </div>
</div>
@endforeach

<a href="{{url('admin/createsection/')}}" class="btn btn-success btn-xs pull-right">Nieuwe Sectie</a>