<?php

class Sponsor extends Eloquent{

	public static $rules = array(
	    'name'=>'required',
	    'file'=>'required',
    );

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sponsors';
}