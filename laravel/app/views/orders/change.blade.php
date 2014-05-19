{{ Form::model($order, array('url'=>'orders/change/'.$order->id, 'class'=>'form-signup')) }} 
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
    	{{ Form::checkbox('anonymous', '1',array('class'=>'form-control', 'placeholder'=>'Naam Op Website')) }}
    	Anonieme bestelling
    </div>
    <h4>Aankopen</h4>
    <?php 
    	// Logic to calculate the amount of products bought
    	$amount = array();
    	foreach($order->orderlists as $orderlist){
	    	$amount[$orderlist->inventory_id] = $orderlist->amount;
    	}
    ?>
   
    @foreach ($products as $product)
    	<?php
    	$amountPerProduct = 0;
    	if(array_key_exists($product->id, $amount)){
	    	$amountPerProduct = $amount[$product->id];
    	}
    	?>
    	<div class="form-group">
    		<label><b><?php echo $product->title; ?></b> €{{$product->price}}</label>
    		<span class="help-block">{{ $product->description }}</span>
    		<div class="input-group">
    			{{ Form::text('product'.$product->id, $amountPerProduct, array('class'=>'form-control', 'placeholder'=>'0')) }}
    			<span class="input-group-addon">Stuks</span>
    		</div>
    	</div>
    @endforeach
    <div class="form-group">
    	{{ Form::submit('Wijzigen', array('class'=>'btn btn-large btn-success btn-block'))}}
    </div>
{{ Form::close() }}