{{ Form::open(array('url'=>'user/login', 'class'=>'form-signup')) }} 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-group">
    	{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Adres')) }}
    </div>
    <div class="form-group">
    	{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Wachtwoord')) }}
    </div>
    <div class="form-group">
    	<div class="btn-group pull-right">
    		<a class="btn btn-warning btn-large" href="{{url('user/iforgot')}}">Ik ben mijn wachtwoord vergeten</a>
    		{{ Form::submit('Inloggen', array('class'=>'btn btn-large btn-success'))}}
    	</div>
    </div>
{{ Form::close() }}