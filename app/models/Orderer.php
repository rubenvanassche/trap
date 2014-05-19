<?php
class Orderer{
	public static $rules = array(
	    'name'=>'required',
	    'url'=>'required|URL',
	    'email'=>'required|email'
    );

	public static function name($newName=''){
		if($newName == ''){
			return Setting::get('orderer.name');
		}else{
			return Setting::set('orderer.name', $newName);
		}
	}
	
	public static function url($newUrl=''){
		if($newUrl == ''){
			return Setting::get('orderer.url');
		}else{
			return Setting::set('orderer.url', $newUrl);
		}
	}
	
	public static function ordertemplate($template=''){
		if($template == ''){
			return Setting::get('orderer.ordertemplate');
		}else{
			return Setting::set('orderer.ordertemplate', $template);
		}
	}
	
	public static function email($newEmail=''){
		if($newEmail == ''){
			return Setting::get('orderer.email');
		}else{
			return Setting::set('orderer.email', $newEmail);
		}
	}	
}