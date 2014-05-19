<?php

class Inventory extends Eloquent{

	public static $rules = array(
	    'title'=>'required',
	    'description'=>'required',
	    'price'=>'required|numeric',
	    'avaible' => 'required|numeric'
    );

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inventory';
	
	public static function sold($id){
		$result = DB::select("SELECT SUM(amount) as sold FROM orderlists WHERE inventory_id = ?", array($id));
		$sold =  $result[0]->sold;
		
		$result = DB::select("SELECT avaible FROM inventory WHERE id = ?", array($id));
		$maybesold = $result[0]->avaible;
		
		return $sold;
	}
	
	public static function mayBeSold($id){
		$result = DB::select("SELECT SUM(amount) as sold FROM orderlists WHERE inventory_id = ?", array($id));
		$sold =  $result[0]->sold;
		
		$result = DB::select("SELECT avaible FROM inventory WHERE id = ?", array($id));
		$maybesold = $result[0]->avaible;
		
		if(($maybesold - $sold) <= 0){
			return false;
		}else{
			return true;
		}
	}
}