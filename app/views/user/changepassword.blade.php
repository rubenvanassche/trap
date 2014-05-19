{{ Form::open(array('url'=>'user/changepassword/'.$user->id, 'class'=>'form-signup')) }} 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-group">
    	{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Wachtwoord')) }}
    </div>
    <div class="form-group">
    	{{ Form::password('passwordAgain', array('class'=>'form-control', 'placeholder'=>'Wachtwoord Opnieuw')) }}
    </div>
    <div class="form-group">
    	{{ Form::submit('Wijzig Wachwtoord', array('class'=>'btn btn-large btn-warning btn-block'))}}
    </div>
{{ Form::close() }}