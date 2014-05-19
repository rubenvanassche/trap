{{ Form::open(array('url'=>'traces/create', 'class'=>'form-signup')) }} 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-group">
    	{{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Titel')) }}
    </div>
    <div class="form-group">
    	{{ Form::text('route', null, array('class'=>'form-control', 'placeholder'=>'Route')) }}
    	<span class="help-block">De route is het stukje na {{Orderer::url()}} ,het bepaald het tracé naar de pagina.</span>
    </div>
    <div class="form-group">
    	<label>Template</label>
    	{{  Form::select('template', $templates,'',  array('class'=>'form-control', 'placeholder'=>'Route')) }}
    </div>
    <div class="form-group">
    	{{ Form::checkbox('cache', '1',false) }}
    	Cache deze pagina
    </div>
    <div class="form-group">
    	<label>Tijd in Cache</label>
    	{{ Form::text('cache_expires', null, array('class'=>'form-control', 'placeholder'=>'Tijd in Cache')) }}
    </div>
    <div class="form-group">
    	{{ Form::submit('Toevoegen', array('class'=>'btn btn-large btn-success btn-block'))}}
    </div>
{{ Form::close() }}
