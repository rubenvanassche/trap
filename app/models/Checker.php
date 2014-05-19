<?php
class Checker extends Eloquent{
	public static $rules = array(
	    'payed'=>'required|numeric',
	    'date' =>'required|date'
    );

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'checkers';

}
?>