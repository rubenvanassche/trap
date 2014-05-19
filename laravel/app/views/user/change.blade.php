{{ Form::model($user, array('url'=>'user/change/'.$user->id, 'class'=>'form-signup')) }} 
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
    	<a href="{{url('user/changepassword/'.$user->id)}}" class="btn btn-large btn-danger btn-block">Wijzig Wachtwoord</a>
    </div>
    <div class="form-group">
    	{{ Form::submit('Wijzigen', array('class'=>'btn btn-large btn-success btn-block'))}}
    </div>
{{ Form::close() }}