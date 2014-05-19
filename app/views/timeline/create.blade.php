{{ Form::open(array('url'=>'timeline/create', 'files'=>true, 'class'=>'form-signup', 'method'=>'post')) }} 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-group">
    	<label>Titel</label>
    	{{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Titel')) }}
    </div>
    <div class="form-group">
    	<label>Datum</label>
    	{{ Form::text('date', date("d-m-Y"), array('class'=>'form-control', 'placeholder'=>'Datum')) }}
    </div>
  
	<ul id="options" class="nav nav-tabs">
		<li class="active"><a href="#message" data-toggle="tab">Bericht</a></li>
		<li><a href="#picture" data-toggle="tab">Afbeelding</a></li>
	</ul>
 
	<div id="optionsContent" class="tab-content">
		<div class="tab-pane fade in active" id="message">
			{{ Form::textarea('message', '', array('class'=>'form-control', 'placeholder'=>'Bericht', 'style'=>'margin-top:10px; margin-bottom:10px;')) }}
		</div>
		<div class="tab-pane fade" id="picture">
			{{ Form::file('picture_url',  array('class'=>'form-control', 'style'=>'margin-top:10px; margin-bottom:10px;')) }}
		</div>
	</div>   
 
    <div class="form-group">
    	{{ Form::submit('Toevoegen', array('class'=>'btn btn-large btn-success btn-block'))}}
    </div>
{{ Form::close() }}