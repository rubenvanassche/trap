<?php
class Trace extends Eloquent{
	public static $rules = array(
	    'title'=>'required',
	    'route'=>'alpha_num|unique:traces',
	    'template'=>'required'
    );

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'traces';

}
?>