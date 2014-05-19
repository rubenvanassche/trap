{{ Form::open(array('url'=>'inventory/create', 'class'=>'form-signup')) }} 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-group">
    	{{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Titel')) }}
    </div>
    <div class="form-group">
    	{{ Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Beschrijving')) }}
    </div>
    <div class="form-group">
	    <div class="input-group">
		    <span class="input-group-addon">€</span>
	  		{{ Form::text('price', null, array('class'=>'form-control', 'placeholder'=>'Prijs')) }}
	  	</div>
    </div>
    <div class="form-group">
    	<div class="input-group">
    		{{ Form::text('avaible', null, array('class'=>'form-control', 'placeholder'=>'Beschikbaarheid')) }}
    		<span class="input-group-addon">Stuks Beschikbaar</span>
    	</div>
    </div>
    <div class="form-group">
    	{{ Form::submit('Toevoegen', array('class'=>'btn btn-large btn-success btn-block'))}}
    </div>
{{ Form::close() }}