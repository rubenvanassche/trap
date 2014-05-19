{{ Form::model($section, array('url'=>'admin/changesection/'.$section->id, 'class'=>'form-signup')) }} 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-group">
    	{{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Titel')) }}
    </div>
    <div class="form-group">
    	{{ Form::textarea('content', null, array('class'=>'form-control sir-trevor-area', 'placeholder'=>'Inhoud')) }}
    </div>
    <div class="form-group">
    	{{ Form::text('caller', null, array('class'=>'form-control', 'placeholder'=>'Caller')) }}
    </div>
    <div class="form-group">
    	<div class="btn-group pull-right">
    		<a class="btn btn-danger btn-large" href="{{url('admin/deletesection/'.$section->id)}}">Verwijderen</a>
    		{{ Form::submit('Wijzigen', array('class'=>'btn btn-large btn-success'))}}
    	</div>
    </div>
{{ Form::close() }}
