<?php

class Order extends Eloquent{

	public static $rules = array(
	    'firstname'=>'required',
	    'lastname'=>'required',
	    'email'=>'required|email'
    );

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'orders';
	
	public function orderlists(){
        return $this->hasMany('Orderlist');
    }

    // Gives how many someone should pay for this order
    public static function checkedField($orderID){
	    $amountToPay = 0;
	    foreach(Inventory::All() as $product){
		    $result = DB::select("SELECT amount FROM orderlists WHERE order_id = ? AND inventory_id = ?", array($orderID, $product->id));
		    if(!empty($result)){
		   		$amountToPay += $result[0]->amount*$product->price;
		   	}
	    }
	    
	    $result = DB::select("SELECT SUM(payed) AS payed FROM checkers WHERE order_id = ?", array($orderID));
	    $amountPayed = $result[0]->payed;
	    
	    if($amountToPay == $amountPayed){
		    return "<i class='glyphicon glyphicon-ok' style='color:green;'></i> ";
	    }else if($amountToPay > $amountPayed){
		    return "<i class='glyphicon glyphicon-warning-sign' style='color:red;'></i> €".($amountPayed-$amountToPay);
	    }else{
		    return "<i class='glyphicon glyphicon-warning-sign' style='color:orange;'></i> €".($amountPayed-$amountToPay);
	    }
    }
    
    // Returns a link to the page for the payment checkers, if there is not yet a payment a new checker will be created otherwise a link to the checkers index for this order will be given.
    public static function checkersField($orderID){
	   	$result = DB::select("SELECT COUNT(id) AS count FROM checkers WHERE order_id = ?", array($orderID));
	    if($result[0]->count != 0){
		    return '<a href="'.url('orders/checkers/'.$orderID).'"><i class="glyphicon glyphicon-euro"></i></a>';
	    }else{
		    return '<a href="'.url('orders/createchecker/'.$orderID).'"><i class="glyphicon glyphicon-euro"></i></a>';
	    }
    }
    
    // Gives True if the user payed the whole order otherwise false
    public static function payed($orderID){
    	$amountToPay = 0;
	    foreach(Inventory::All() as $product){
		    $result = DB::select("SELECT amount FROM orderlists WHERE order_id = ? AND inventory_id = ?", array($orderID, $product->id));
		    if(!empty($result)){
		   		$amountToPay += $result[0]->amount*$product->price;
		   	}
	    }
    
	    $result = DB::select("SELECT SUM(payed) AS payed FROM checkers WHERE order_id = ?", array($orderID));
	    $amountPayed = $result[0]->payed;
	    
	    if($amountToPay == $amountPayed){
		    return true;
	    }else{
		    return false;
	    }
    }
}