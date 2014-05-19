<?php

class Section extends Eloquent{

	public static $rules = array(
	    'title'=>'required|unique:sections',
	    'content'=>'required',
	    'caller'=>'required|unique:sections'
    );

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sections';

}