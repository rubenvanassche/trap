<?php

class InventoryController extends BaseController{
	protected $layout = "layouts.master";
	
	function __construct(){
		$this->beforeFilter('auth');
	}
	
	function getIndex(){
		$data['products'] = Inventory::All();
		$this->layout->content = View::make('inventory.index', $data);
		$this->layout->title = "Producten";
	}
	
	function getCreate(){
		$this->layout->content = View::make('inventory.create');
		$this->layout->title = "Nieuw Product";
	}
	
	public function postCreate() {    	
        $validator = Validator::make(Input::all(), Inventory::$rules);
 
	    if ($validator->passes()) {
		    $inventory = new Inventory;
		    $inventory->title = Input::get('title');
		    $inventory->description = Input::get('description');
		    $inventory->avaible = Input::get('avaible');
		    $inventory->price = Input::get('price');
		    $inventory->save();
		 
		    return Redirect::to('inventory')->with('message', 'Product toegevoegd!');
	    } else {
	         return Redirect::to('inventory/create')->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }
	}
	
	function getChange($id){
		$data['product'] = Inventory::find($id);
		$this->layout->content = View::make("inventory.change", $data);
		$this->layout->title = "Wijzig Product";	
	}
	
	function postChange($id){
        $validator = Validator::make(Input::all(), Inventory::$rules);
 
	    if ($validator->passes()) {
		    $inventory = Inventory::find($id);
		    $inventory->title = Input::get('title');
		    $inventory->description = Input::get('description');
		    $inventory->avaible = Input::get('avaible');
		    $inventory->price = Input::get('price');
		    $inventory->save();
		 
		    return Redirect::to('inventory')->with('message', 'Product Gewijzigd!');
	    } else {
	         return Redirect::to('inventory/change/'.$id)->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }		
	}

	function getDelete($id){   	
		Inventory::destroy($id);
		return Redirect::to('inventory')->with('message', 'Product verwijderd!');
	}
}

?>