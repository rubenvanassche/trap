{{ Form::open(array('url'=>'orders/create', 'class'=>'form-signup')) }} 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-group">
    	<label>Voornaam</label>
    	{{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'Voornaam')) }}
    </div>
    <div class="form-group">
    	<label>Achternaam</label>
    	{{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Achternaam')) }}
    </div>
    <div class="form-group">
    	<label>Email Adres</label>
    	{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Adres')) }}
    </div>
    <div class="form-group">
    	<label>Naam op website</label>
    	{{ Form::text('websitename', null, array('class'=>'form-control', 'placeholder'=>'Naam Op Website')) }}
    </div>
    <div class="form-group">
    	{{ Form::checkbox('anonymous', '1',false) }}
    	Anonieme bestelling
    </div>
    <h4>Aankopen</h4>
    <?php $i = 0; ?>
    @foreach ($products as $product)
    	<div class="form-group">
    		<label><b><?php echo $product->title; ?></b> €{{$product->price}}</label>
    		<span class="help-block">{{ $product->description }}</span>
    		<div class="input-group">
    			{{ Form::text('product'.$i++, '', array('class'=>'form-control', 'placeholder'=>'0')) }}
    			<span class="input-group-addon">Stuks</span>
    		</div>
    	</div>
    @endforeach
    <div class="form-group">
    	{{ Form::submit('Toevoegen', array('class'=>'btn btn-large btn-success btn-block'))}}
    </div>
{{ Form::close() }}