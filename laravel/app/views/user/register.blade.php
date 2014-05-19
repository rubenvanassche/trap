{{ Form::open(array('url'=>'user/create', 'class'=>'form-signup')) }} 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-group">
    	{{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'Voornaam')) }}
    </div>
    <div class="form-group">
    	{{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Achternaam')) }}
    </div>
    <div class="form-group">
    	{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Adres')) }}
    </div>
    <div class="form-group">
    	{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Wachtwoord')) }}
    </div>
    <div class="form-group">
    	{{ Form::submit('Toevoegen', array('class'=>'btn btn-large btn-success btn-block'))}}
    </div>
{{ Form::close() }}