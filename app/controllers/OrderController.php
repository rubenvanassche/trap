<?php

class OrderController extends BaseController{
	protected $layout = "layouts.master";
	
	function __construct(){
		$this->beforeFilter('auth');
	}
	
	function getIndex(){
		$data['orders'] = Order::All();
		$this->layout->content = View::make('orders.index', $data);
		$this->layout->title = "Bestellingen";
	}
	
	function getCreate(){
		$data['products'] = Inventory::All();
		$this->layout->content = View::make('orders.create', $data);
		$this->layout->title = "Nieuwe Bestelling";
	}
	
	function postCreate(){
		// Create rules for all the product(i) fields
		$productFields = Inventory::All()->count();
		$rules = Order::$rules;
		for($i = 0;$i < $productFields;$i++){
			$rules['product'.$i] = 'required|numeric';
		}
		
        $validator = Validator::make(Input::all(), $rules);
 
	    if ($validator->passes()) {
		    $order = new Order;
		    $order->firstname = Input::get('firstname');
		    $order->lastname = Input::get('lastname');
		    $order->email = Input::get('email');
		    $order->websitename = Input::get('websitename');
		    if(Input::get('anonymous') == '1'){
			    $order->anonymous = 1;
		    }else{
			    $order->anonymous = 0;
		    }

		    $order->save();
		    
		    $inventory = Inventory::All();
		    
		    for($i = 0;$i < $productFields;$i++){
			    if(Input::get('product'.$i) != '0'){
				    $orderlist = new Orderlist;
				    $orderlist->amount = Input::get('product'.$i);
				    $orderlist->order_id = $order->id;
				    $orderlist->inventory_id = $inventory[$i]->id;
				    $orderlist->save();
			    }
		    }
		 
		    return Redirect::to('orders')->with('message', 'Bestelling toegevoegd!');
	    } else {
	         return Redirect::to('orders/create')->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }
	}
	
	function getChange($id){
		$data['products'] = Inventory::All();
		$data['order'] = Order::find($id);
		$this->layout->content = View::make('orders.change', $data);
		$this->layout->title = "Wijzig Bestelling";		
	}

	function postChange($id){
		// Create rules for all the product(i) fields
		$productFields = Inventory::All()->count();
		$rules = Order::$rules;
		$products = Inventory::All();
		foreach($products as $product){
			$rules['product'.$product->id] = 'required|numeric|min:0';
		}
		
        $validator = Validator::make(Input::all(), $rules);
 
	    if ($validator->passes()) {
		    $order = Order::find($id);
		    $order->firstname = Input::get('firstname');
		    $order->lastname = Input::get('lastname');
		    $order->email = Input::get('email');
		    $order->websitename = Input::get('websitename');
		    if(Input::get('anonymous') == '1'){
			    $order->anonymous = 1;
		    }else{
			    $order->anonymous = 0;
		    }

		    $order->save();
		    
		    $inventory = Inventory::All();
		    
		    foreach($products as $product){
		    		// Check if list exists
		    		$results = DB::select("SELECT Count(id) AS count FROM orderlists WHERE order_id = ? AND inventory_id = ?", array($order->id, $product->id));
		    		if($results[0]->count == 0){
			    		DB::Insert("INSERT INTO orderlists (amount, order_id, inventory_id) VALUES (?,?,?)", array(Input::get('product'.$product->id), $order->id, $product->id));	
		    		}else{
				    	DB::update("UPDATE orderlists SET amount = ? WHERE order_id = ? AND inventory_id = ?", array(Input::get('product'.$product->id), $order->id, $product->id));
				    }
		    }
		 
		    return Redirect::to('orders')->with('message', 'Bestelling gewijzigd!');
	    } else {
	         return Redirect::to('orders/change/'.$id)->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }
	}
	
	function getDelete($id){   	
		Order::destroy($id);
		DB::delete("DELETE FROM orderlists WHERE order_id = ?", array($id));
		DB::delete("DELETE FROM checkers WHERE order_id = ?", array($id));
		return Redirect::to('orders')->with('message', 'Bestelling verwijderd!');
	}
	
	function getCheckers($orderID){
		$data['orderID'] = $orderID;
		$data['checkers'] = DB::select("SELECT payed, DATE_FORMAT(date, '%d-%m-%Y') as date, id, user_id, (SELECT CONCAT(firstname, ' ', lastname) FROM users WHERE id = checkers.user_id ) as user FROM checkers WHERE order_id = ?", array($orderID));
		$this->layout->content = View::make('checkers.index', $data);
		$this->layout->title = "Betalingen Bestelling ".$orderID;		
	}
	
	function getCreatechecker($orderID){
		$data['orderID'] = $orderID;
		$this->layout->content = View::make('checkers.create', $data);
		$this->layout->title = "Nieuwe Betaling";		
	}
	
	function postCreatechecker($orderID){
        $validator = Validator::make(Input::all(), Checker::$rules);
 
	    if ($validator->passes()) {
	        $date = Input::get('date');
	        $date = date("Y-m-d", strtotime($date));
	        
		    $checker = new Checker;
		    $checker->date = $date;
		    $checker->payed = Input::get('payed');
		    $checker->user_id = Auth::user()->id;
		    $checker->order_id = $orderID;
		    $checker->save();
		 
		    return Redirect::to('orders/checkers/'.$orderID)->with('message', 'Betaling Toegevoegd!');
	    } else {
	         return Redirect::to('orders/createchecker/'.$orderID)->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }		
	}
	
	function getChangechecker($orderID, $checkerID){
		$data['orderID'] = $orderID;
		$data['checker'] = Checker::find($checkerID);
		$this->layout->content = View::make('checkers.change', $data);
		$this->layout->title = "Wijzig Betaling";		
	}
	
	function postChangechecker($orderID, $checkerID){
        $validator = Validator::make(Input::all(), Checker::$rules);
 
	    if ($validator->passes()) {
	        $date = Input::get('date');
	        $date = date("Y-m-d", strtotime($date));
	        
		    $checker = Checker::find($checkerID);
		    $checker->date = $date;
		    $checker->payed = Input::get('payed');
		    $checker->user_id = Auth::user()->id;
		    $checker->order_id = $orderID;
		    $checker->save();
		 
		    return Redirect::to('orders/checkers/'.$orderID)->with('message', 'Betaling Gewijzigd!');
	    } else {
	         return Redirect::to('orders/changechecker/'.$orderID.'/'.$checkerID)->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }		
	}
	
	function getDeletechecker($orderID, $checkerID){
		DB::delete("DELETE FROM checkers WHERE order_id = ? AND id = ?", array($orderID, $checkerID));
		return Redirect::to('orders/checkers/'.$orderID)->with('message', 'Betaling verwijderd!');
	}
}

?>