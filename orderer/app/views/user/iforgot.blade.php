{{ Form::open(array('url'=>'user/iforgot', 'class'=>'form-signup')) }} 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-group">
    	{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Adres')) }}
    </div>
    <div class="form-group">
    	{{ Form::submit('Stuur mij een nieuw wachtwoord', array('class'=>'btn btn-large btn-success btn-block'))}}
    </div>
{{ Form::close() }}