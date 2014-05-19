<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome(){
		return View::make('hello');
	}
	
	public function orderForm(){
		$convert = new STConverter();
		foreach(Section::All() as $section){
			$data[$section->caller] = $convert->toHtml($section->content);
		}
		
		$data['title'] = 'Bestellen';
		$data['orderform'] = View::make('orders.order', array('products'=>Inventory::All()));
		$template = Template::fileToTemplate(Orderer::ordertemplate());
		return View::make($template, $data);
	}
	
	public function orderWorker(){
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
		    
		    $code = $order->id.$order->firstname.$order->lastname;
		    $onwebsite = $order->websitename;
		    $firstname = $order->firstname;
		    $lastname = $order->lastname;
		    $anonymous = $order->anonymous;
		    $totaltopay = 0;
		  
		    
		    for($i = 0;$i < $productFields;$i++){
			    if(Input::get('product'.$i) != '0'){
				    $orderlist = new Orderlist;
				    $orderlist->amount = Input::get('product'.$i);
				    $orderlist->order_id = $order->id;
				    $orderlist->inventory_id = $inventory[$i]->id;
				    $orderlist->save();
				    
				    $totaltopay += $orderlist->amount*$inventory[$i]->price;
			    }
		    }
		    
		    $emaildata = array('totaltopay'=>$totaltopay,'code'=>$code,'onwebsite'=>$onwebsite, 'firstname'=>$firstname, 'lastname'=>$lastname, 'anonymous'=>$anonymous);
		    
		    Mail::send('emails.success', $emaildata, function($message){
			    $subject = Setting::get('orderer.emails.success.subject');
			    
			    $message->from(Orderer::email(), Orderer::name());
		    
			    $message->to(Input::get('email'), Input::get('firstname').' '.Input::get('lastname'))->subject($subject);
			});
		 
		    return Redirect::to('thanks')->with('message', 'Dank u voor uw bestelling!');
	    } else {
	         return Redirect::to('order')->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }
	}
	
	public function site($route=''){
		$trace = DB::select("SELECT * FROM traces WHERE route = ?", array($route));
		
		if(empty($trace)){
			// Show a 404 because the page couldn't be found
			return View::make('layouts.404');
		}
		
		// Start a very basic but usefull cache
		// Check if the current page is in the cache
		if($trace[0]->cache == '1' and Cache::has('trace'.$trace[0]->id)){
			return Cache::get('trace'.$trace[0]->id);
		}
		
		$template = Template::fileToTemplate($trace[0]->template);
		
		$data = array();
		$data['title'] = $trace[0]->title;
	
		$convert = new STConverter();
		foreach(Section::All() as $section){
			$data[$section->caller] = $convert->toHtml($section->content);
		}	

		$output = View::make(''.$template, $data);
		
		// If we need to cache, do it!
		if($trace[0]->cache == '1'){
			Cache::put('trace'.$trace[0]->id, $output->render(), $trace[0]->cache_expires);
			return $output;
		}else{
			return $output;
		}
	}

}