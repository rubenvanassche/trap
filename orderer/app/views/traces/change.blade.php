{{ Form::model($trace, array('url'=>'traces/change/'.$trace->id, 'class'=>'form-signup')) }} 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-group">
    	<label>Titel</label>
    	{{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Titel')) }}
    </div>
    <div class="form-group">
    	<label>Route</label>
    	{{ Form::text('route', null, array('class'=>'form-control', 'placeholder'=>'Route')) }}
    	<span class="help-block">De route is het stukje na {{Orderer::url()}} ,het bepaald het tracé naar de pagina.</span>
    </div>
    <div class="form-group">
    	<label>Template</label>
    	{{  Form::select('template', $templates,$trace->template,  array('class'=>'form-control', 'placeholder'=>'Route')) }}
    </div>
    <div class="form-group">
    	{{ Form::checkbox('cache', '1',array('class'=>'form-control', 'placeholder'=>'Cache')) }}
    	Cache deze pagina
    </div>
    <div class="form-group">
    	<label>Tijd in Cache</label>
    	{{ Form::text('cache_expires', null, array('class'=>'form-control', 'placeholder'=>'Tijd in Cache')) }}
    </div>
    <div class="form-group">
    	<div class="btn-group pull-right">
    		<a class="btn btn-danger btn-large" href="{{url('traces/delete/'.$trace->id)}}">Verwijderen</a>
    		{{ Form::submit('Wijzigen', array('class'=>'btn btn-large btn-success'))}}
    	</div>
    </div>
{{ Form::close() }}
