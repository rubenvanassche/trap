{{ Form::open(array('url'=>'admin/generalpreferences', 'class'=>'form-signup')) }} 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-group">
    	<label>Naam van de website</label>
    	{{ Form::text('name', $name, array('class'=>'form-control', 'placeholder'=>'Naam van de website')) }}
    </div>
    <div class="form-group">
    	<label>URL van de website</label>
    	{{ Form::text('url', $url, array('class'=>'form-control', 'placeholder'=>'http://localhost:8000/')) }}
    </div>
    <div class="form-group">
    	<label>Email adres van de website</label>
    	{{ Form::text('email', $email, array('class'=>'form-control', 'placeholder'=>'email@orderer.com')) }}
    </div>
    <div class="form-group">
    	<label>Template voor bestel formulier</label>
    	{{  Form::select('ordertemplate', $templates, $ordertemplate,  array('class'=>'form-control', 'placeholder'=>'template')) }}
    </div>
    <div class="form-group">
    	{{ Form::submit('Wijzigen', array('class'=>'btn btn-large btn-success btn-block'))}}
    </div>
{{ Form::close() }}
