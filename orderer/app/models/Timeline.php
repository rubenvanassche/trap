<?php

class Timeline extends Eloquent{

	public static $rules = array(
	    'title'=>'required',
	    'date'=>'required|date',
	    'message'=>'',
	    'picture_url'=>'',
    );

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'timeline';
	
	function getContent($id){
		$result = DB::select("SELECT message, picture_url FROM timeline WHERE id = ?",array($id) );
		$message = $result[0]->message;
		$picture_url = $result[0]->picture_url;
		
		if($message == '0' and $picture_url == '0'){
			return false;
		}else if($message == '0'){
			return '<img class="img-responsive" src="'.$picture_url.'"/>';
		}else if($picture_url == '0'){
			return $message;
		}else{
			return false;
		}
	}
}