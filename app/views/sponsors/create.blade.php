{{ Form::open(array('url'=>'sponsors/create', 'files'=>true, 'class'=>'form-signup', 'method'=>'post')) }} 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-group">
    	<label>Naam</label>
    	{{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Naam')) }}
    </div>
    
    <div class="form-group">
    	<label>Afbeelding</label>
    	{{ Form::file('file',  array('class'=>'form-control')) }}
    </div> 
 
    <div class="form-group">
    	{{ Form::submit('Toevoegen', array('class'=>'btn btn-large btn-success btn-block'))}}
    </div>
{{ Form::close() }}