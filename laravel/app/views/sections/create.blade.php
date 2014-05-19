{{ Form::open(array('url'=>'admin/createsection', 'class'=>'form-signup')) }} 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-group">
    	{{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Titel')) }}
    </div>
    <div class="form-group">
    	{{ Form::textarea('content', null, array('class'=>'form-control sir-trevor-area', 'placeholder'=>'Inhoud')) }}
    </div>
    <div class="form-group">
    	{{ Form::text('caller', null, array('class'=>'form-control', 'placeholder'=>'Caller')) }}
    </div>
    <div class="form-group">
    	{{ Form::submit('Toevoegen', array('class'=>'btn btn-large btn-success btn-block'))}}
    </div>
{{ Form::close() }}
