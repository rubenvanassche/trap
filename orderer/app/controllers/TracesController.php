<?php
class TracesController extends BaseController {
	protected $layout = "layouts.master";
	
	public function __construct() {
	    $this->beforeFilter('auth');
	}
	
	public function getIndex(){
		$data['traces'] = Trace::All();
		$this->layout->content = View::make('traces.index', $data);
		$this->layout->title = "Tracés";
	}
	
	public function getCreate(){
		$data['templates'] = Template::All();
		$this->layout->content = View::make('traces.create', $data);
		$this->layout->title = "Nieuw Tracé";
	}
	
	public function postCreate(){
        $validator = Validator::make(Input::all(), Trace::$rules);
 
	    if ($validator->passes()) {
		    $trace = new Trace;
		    $trace->title = Input::get('title');
		    $trace->route = Input::get('route');
		    $trace->template = Input::get('template');
		    $trace->cache_expires = Input::get('cache_expires');
		    if(Input::get('cache') == '1'){
			    $trace->cache = 1;
		    }else{
			    $trace->cache = 0;
		    }
		    $trace->save();
		 
		    return Redirect::to('traces')->with('message', 'Tracé Toegevoegd!');
	    } else {
	         return Redirect::to('traces/create')->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }		
	}
	
	public function getChange($id){
		$data['templates'] = Template::All();
		$data['trace'] = Trace::find($id);
		$this->layout->content = View::make('traces.change', $data);
		$this->layout->title = "Wijzig Tracé";		
	}
	
	public function postChange($id){
		$rules = Trace::$rules;
		$rules['route'] = 'alpha_num';
        $validator = Validator::make(Input::all(), $rules);
 
	    if ($validator->passes()) {
		    $trace = Trace::find($id);
		    $trace->title = Input::get('title');
		    $trace->route = Input::get('route');
		    $trace->template = Input::get('template');
		    $trace->cache_expires = Input::get('cache_expires');
		    if(Input::get('cache') == '1'){
			    $trace->cache = 1;
		    }else{
			    $trace->cache = 0;
		    }		    
		    $trace->save();
		 
		    return Redirect::to('traces')->with('message', 'Tracé Gewijzigd!');
	    } else {
	         return Redirect::to('traces/change/'.$id)->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }		
	}
	
	public function getDelete($id){
		Trace::destroy($id);
		return Redirect::to('traces')->with('message', 'Tracé verwijderd!');		
	}
}
	
?>