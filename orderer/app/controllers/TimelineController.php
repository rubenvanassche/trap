<?php

class TimelineController extends BaseController{
	protected $layout = "layouts.master";
	
	function __construct(){
		$this->beforeFilter('auth');
	}
	
	function getIndex(){
		$data['timeline'] = Timeline::All();
		$this->layout->content = View::make('timeline.index', $data);
		$this->layout->title = "Tijdslijn";
	}

	function getCreate(){
		$this->layout->content = View::make('timeline.create');
		$this->layout->title = "Nieuw Bericht";		
	}
	
	function postCreate(){
        $validator = Validator::make(Input::all(), Timeline::$rules);
 
	    if ($validator->passes()) {
	        $date = Input::get('date');
	        $date = date("Y-m-d", strtotime($date));
	        
		    $timeline = new Timeline;
		    $timeline->date = $date;
		    $timeline->title = Input::get('title');

		    $message = Input::get('message');
		    $picture_url = Input::file('picture_url');
		    if($message == '' and $picture_url == ''){
				return Redirect::to('timeline')->with('message', 'Gelieve  een bericht of een foto toe te voegen.');
			}else if($message == ''){
				// Time to do some upload logic
			   $file = $picture_url;

			   $destinationPath    = 'public/uploads/timeline/'; // The destination were you store the image.
			   $filename           = $file->getClientOriginalName(); // Original file name that the end user used for it.
			   $mime_type          = $file->getMimeType(); // Gets this example image/png
			   $extension          = $file->getClientOriginalExtension(); // The original extension that the user used example .jpg or .png.
			   $upload_success     = $file->move($destinationPath, $filename); // Now we move the file to its new home.
			
			
			   // You don't need the Redirect to make the image upload work it's just here for example only
			   $timeline->picture_url =  url().'/uploads/timeline/'.$filename;
			   $timeline->message = 0;
			}else if($picture_url == ''){
				$timeline->message = $message;
				$timeline->picture_url = 0;
			}else{
				return Redirect::to('timeline')->with('message', 'Gelieve een bericht of een foto toe te voegen.');
			}

		    $timeline->save();
		 
		    return Redirect::to('timeline')->with('message', 'Bericht Toegevoegd!');
	    } else {
	         return Redirect::to('timeline/create')->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }		
	}

	function getDelete($id){   	
		DB::delete("DELETE FROM timeline WHERE id = ?", array($id));
		return Redirect::to('timeline')->with('message', 'Bericht verwijderd!');
	}
}

?>