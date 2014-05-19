<?php

class OrderList extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'orderlists';
	
	public function order(){
        return $this->belongsTo('Order');
    }

}