{{ Form::open(array('url'=>'admin/emails', 'class'=>'form-signup')) }} 
	<h4>Success bij bestelling</h4>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-group">
    	<label>Onderwerp</label>
    	{{ Form::text('subject', $subject, array('class'=>'form-control', 'placeholder'=>'Onderwerp')) }}
    </div>
    <div class="form-group">
    	<label>Inhoud</label>
    	{{ Form::textarea('content', $content, array('placeholder'=>'Inhoud', 'class'=>'form-control', 'style'=>'height:500px;')) }}
    </div>
    <div class="form-group">
    	<label><b>Bruikbare elementen</b></label>
		<table class="table">
	      <thead>
	        <tr>
	          <th>Caller</th>
	          <th>Beschrijving</th>
	        </tr>
	      </thead>
	      <tbody>
	        <tr>
	          <td>@{{$firstname}}</td>
	          <td>Voornaam</td>
	        </tr>
	        <tr>
	          <td>@{{$lastname}}</td>
	          <td>Achternaam</td>
	        </tr>	        
	        <tr>
	          <td>@{{$code}}</td>
	          <td>Code voor de overschrijving</td>
	        </tr>
	        <tr>
	          <td>@{{$totaltopay}}</td>
	          <td>Totaalbedrag te betalen</td>
	        </tr>
	        <tr>
	          <td>@{{$onwebsite}}</td>
	          <td>Naam op de website</td>
	        </tr>
	      </tbody>
	    </table>
    </div>
    <div class="form-group">
    	{{ Form::submit('Wijzigen', array('class'=>'btn btn-large btn-success btn-block'))}}
    </div>
{{ Form::close() }}
