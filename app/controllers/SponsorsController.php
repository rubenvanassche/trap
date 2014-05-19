<?php

class SponsorsController extends BaseController{
	protected $layout = "layouts.master";
	
	function __construct(){
		$this->beforeFilter('auth');
	}
	
	function getIndex(){
		$data['sponsors'] = Sponsor::All();
		$this->layout->content = View::make('sponsors.index', $data);
		$this->layout->title = "Sponsors";
	}

	function getCreate(){
		$this->layout->content = View::make('sponsors.create');
		$this->layout->title = "Nieuwe Sponsor";		
	}
	
	function postCreate(){
        $validator = Validator::make(Input::all(), Sponsor::$rules);
 
	    if ($validator->passes()) {
	        
		    $sponsor = new Sponsor;
		    $sponsor->name = Input::get('name');

		    $file = Input::file('file');

		    $destinationPath    = 'public/uploads/sponsors/'; // The destination were you store the image.
		    $filename           = $file->getClientOriginalName(); // Original file name that the end user used for it.
		    $mime_type          = $file->getMimeType(); // Gets this example image/png
		    $extension          = $file->getClientOriginalExtension(); // The original extension that the user used example .jpg or .png.
		    $upload_success     = $file->move($destinationPath, $filename); // Now we move the file to its new home.
		
		
		    // You don't need the Redirect to make the image upload work it's just here for example only
		    $sponsor->file =  url().'/uploads/sponsors/'.$filename;

		    $sponsor->save();
		 
		    return Redirect::to('sponsors')->with('message', 'Sponsor Toegevoegd!');
	    } else {
	         return Redirect::to('sponsors/create')->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }		
	}

	function getDelete($id){   	
		DB::delete("DELETE FROM sponsors WHERE id = ?", array($id));
		return Redirect::to('sponsors')->with('message', 'Sponsor verwijderd!');
	}
}

?>