{{ Form::open(array('url'=>'orders/createchecker/'.$orderID, 'class'=>'form-signup')) }} 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-group">
    	{{ Form::text('date', date("d-m-Y"), array('class'=>'form-control', 'placeholder'=>'Datum')) }}
    </div>
    <div class="form-group">
   		<div class="input-group">
   			<span class="input-group-addon">€</span>
   			{{ Form::text('payed', null, array('class'=>'form-control', 'placeholder'=>'Betaald')) }}
  		</div>
    </div>
    <div class="form-group">
    	{{ Form::submit('Toevoegen', array('class'=>'btn btn-large btn-success btn-block'))}}
    </div>
{{ Form::close() }}