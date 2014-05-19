{{ Form::open(array('url'=>'orderWorker', 'class'=>'form-signup')) }}
	<?php 
	$errors = $errors->all();
	if (!empty($errors)){ 
	?>
		<div class="alert alert-danger alert-dismissable">
		        @foreach($errors as $error)
		            <p>{{ $error }}</p>
		        @endforeach
		</div>
	<?php } ?>
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
    	{{ Form::text('websitename', null, array('class'=>'form-control', 'placeholder'=>'Naam Op Website', 'id' => 'websitename')) }}
    </div>
    <div class="form-group">
    	{{ Form::checkbox('anonymous', '1',false, array('id'=>'anonymi')) }}
    	Ik wens anoniem te blijven
    </div>
    <?php $i = 0; ?>
    @foreach ($products as $product)
    	<?php
    	if(!Inventory::mayBeSold($product->id)){
    		echo Form::hidden('product'.$i++, '0');
	    	continue;
    	}
    	?>
    	<div class="form-group">
    		<label><b><?php echo $product->title; ?></b> €{{$product->price}}</label>
    		<span class="help-block">{{ $product->description }}</span>
    		<div class="input-group">
    			{{ Form::text('product'.$i++, '0', array('class'=>'form-control', 'placeholder'=>'')) }}
    			<span class="input-group-addon">Stuks</span>
    		</div>
    	</div>
    @endforeach
    <div class="form-group">
    	{{ Form::submit('Bestellen', array('class'=>'btn btn-large btn-success btn-block'))}}
    </div>
{{ Form::close() }}