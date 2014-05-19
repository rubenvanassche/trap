<?php
class AdminController extends BaseController{
	protected $layout = "layouts.master";
	
	function __construct(){
		$this->beforeFilter('auth');
	}
	
	function getIndex(){
		$data['amountUsers'] = User::All()->count();
		$data['amountSections'] = Section::All()->count();
		$data['amountOrders'] = Order::All()->count();
		
		
		foreach(Inventory::All() as $product){
			$result = DB::select('SELECT SUM(amount) AS count FROM orderlists WHERE inventory_id = ?', array($product->id));
			$data['amountInventory'][$product->title] = $result[0]->count;
		}
		
		$this->layout->content = View::make('admin.dashboard', $data);
		$this->layout->title = "Dashboard";
	}
	
	function getSections(){
		$data['sections'] = Section::All();
		$this->layout->content = View::make("sections.index", $data);
		$this->layout->title = "Secties";
	}
	
	function getCreatesection(){
		$this->layout->content = View::make("sections.create");
		$this->layout->title = "Nieuwe Sectie";
	}
	
	function postCreatesection(){    	
        $validator = Validator::make(Input::all(), Section::$rules);
 
	    if ($validator->passes()) {
		    $section = new Section;
		    $section->title = Input::get('title');
		    $section->content = Input::get('content');
		    $section->caller = Input::get('caller');
		    $section->user_id = Auth::user()->id;
		    $section->save();
		    
		    return Redirect::to('admin/sections')->with('message', 'Sectie toegevoegd!');
	    } else {
	         return Redirect::to('admin/createsection')->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }
	}
	
	function getChangesection($id){
		$data['section'] = Section::find($id);
		$this->layout->content = View::make("sections.change", $data);
		$this->layout->title = "Wijzig/Verwijder Sectie";		
	}
	
	function postChangesection($id){
		$rules = array('title'=>'required', 'content'=>'required', 'caller'=>'required');
        $validator = Validator::make(Input::all(), $rules);
 
	    if ($validator->passes()) {
		    $section = Section::find($id);
		    $section->title = Input::get('title');
		    $section->content = Input::get('content');
		    $section->caller = Input::get('caller');
		    $section->user_id = Auth::user()->id;
		    $section->save();
		 
		    return Redirect::to('admin/sections')->with('message', 'Sectie Gewijzigd!');
	    } else {
	         return Redirect::to('admin/changesection/'.$id)->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }	
	}
	
	function getDeletesection($id){   	
		Section::destroy($id);
		return Redirect::to('admin/sections')->with('message', 'Sectie verwijderd!');
	}
	
	function getGeneralpreferences(){
		$data['name'] = Orderer::name();
		$data['url'] = Orderer::url();
		$data['email'] = Orderer::email();
		$data['templates'] = Template::All();
		$data['ordertemplate'] = Orderer::ordertemplate();
		$this->layout->content = View::make("admin.generalpreferences", $data);
		$this->layout->title = "Algemene Voorkeuren";	
	}
	
	function postGeneralpreferences(){
        $validator = Validator::make(Input::all(), Orderer::$rules);
 
	    if ($validator->passes()) {
		    Orderer::name(Input::get('name'));
		    Orderer::url(Input::get('url'));
		    Orderer::email(Input::get('email'));
		    Orderer::ordertemplate(Input::get('ordertemplate'));
		 
		    return Redirect::to('admin/generalpreferences')->with('message', 'Voorkeuren gewijzigd!');
	    } else {
	         return Redirect::to('admin/generalpreferences')->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }	
	}
	
	function getAbout(){
		$result = DB::select("SELECT VERSION() as version");
		$data['mysql_version'] = $result[0]->version;
		$this->layout->content = View::make("admin.about", $data);
		$this->layout->title = "Over Orderer";		
	}
	
	function getLicense(){
		$this->layout->content = View::make("admin.license");
		$this->layout->title = "License";	
	}
	
	function getEmails(){
		$emailsPath = app_path().'/views/emails/';
		$data['content'] = file_get_contents($emailsPath.'success.blade.php');
		$data['subject'] = Setting::get('orderer.emails.success.subject');
		$this->layout->content = View::make("admin.emails", $data);
		$this->layout->title = "Emails";			
	}
	
	function postEmails(){
		$rules = array('subject'=>'required', 'content'=>'required');
        $validator = Validator::make(Input::all(), $rules);
        $emailsPath = app_path().'/views/emails/';
 
	    if ($validator->passes()) {
		    Setting::set('orderer.emails.success.subject', Input::get('subject'));
		    file_put_contents($emailsPath.'success.blade.php', Input::get('content'));
		    
		    return Redirect::to('admin/emails')->with('message', 'Emails Gewijzigd!');
	    } else {
	         return Redirect::to('admin/emails')->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }			
	}
}

?>