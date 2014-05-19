<?php
 
class UserController extends BaseController {
	protected $layout = "layouts.master";
	
	public function __construct() {
	    $this->beforeFilter('csrf', array('on'=>'post'));
	}
	
	public function getIndex(){
		if (!Auth::check()){
			return Redirect::to('user/login')->with('message', 'Gelive in te loggen om deze pagina te bekijken!');
    	}
    	$data['users'] = User::all();
    	
    	$this->layout->content = View::make('user.index',$data);
		$this->layout->title = "Gebruikers";
	}
	
	public function getRegister() {
		if (!Auth::check()){
			return Redirect::to('user/login')->with('message', 'Gelive in te loggen om deze pagina te bekijken!');
    	}
    	
	    $this->layout->content = View::make('user.register');
	    $this->layout->title = "Nieuwe Gebruiker";
	}
	
	public function postCreate() {
		if (!Auth::check()){
			return Redirect::to('user/login')->with('message', 'Gelive in te loggen om deze pagina te bekijken!');
    	}
    	
        $validator = Validator::make(Input::all(), User::$rules);
 
	    if ($validator->passes()) {
		    $user = new User;
		    $user->firstname = Input::get('firstname');
		    $user->lastname = Input::get('lastname');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();
		 
		    return Redirect::to('user')->with('message', 'Gebruiker toegevoegd!');
	    } else {
	         return Redirect::to('user/register')->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }
	}
	
	public function getLogin() {
	    $this->layout->content = View::make('user.login');
	    $this->layout->title = "Inloggen";
	    $this->layout->hideAdmin = true;
	}
	
	public function postLogin() {
	    if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
		    return Redirect::to('admin')->with('message', 'Welkom!');
		} else {
		    return Redirect::to('user/login')
		        ->with('message', 'Foute gebruikersnaam/wachtwoord combinatie')
		        ->withInput();
		} 
	}
	
	public function getLogout() {
	    Auth::logout();
	    return Redirect::to('user/login')->with('message', 'Je bent nu uitgelogd!');	     
	}
	
	public function getIforgot(){
	    $this->layout->content = View::make('user.iforgot');
	    $this->layout->title = "Nieuw Wachtwoord Aanvragen";
	    $this->layout->hideAdmin = true;		
	}
	
	public function postIforgot(){
		$rules['email'] = 'required|email|exists:users,email';
		$validator = Validator::make(Input::all(), $rules);
 
	    if ($validator->passes()) {
	    	// Generate a random string
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $randstring = '';
		    for ($i = 0; $i < 10; $i++) {
		        $randstring = $characters[rand(0, strlen($characters))];
		    }
		    
		    $password = Hash::make($randstring);
		    $email = Input::get('email');
		   
		    
		    //Mail::send('user.iforgotmail', array('password'=>$randstring), function($message){
			//    $message->to($email, '')->subject('Nieuw Wachtwoord voor '.Orderer::name());
			//});
		    
		    DB::update("UPDATE users SET password = ? WHERE email = ?", array($password, $email));
		 
		    return Redirect::to('user/login')->with('message', 'We hebben een mail gestuurd met jouw nieuw wachtwoord!');
	    } else {
	         return Redirect::to('user/iforgot')->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }
	}
	
	public function getChange($id){
		if (!Auth::check()){
			return Redirect::to('user/login')->with('message', 'Gelive in te loggen om deze pagina te bekijken!');
    	}
	
		$data['user'] = User::find($id);
		$this->layout->content = View::make('user.change', $data);
	    $this->layout->title = "Wijzig Gebruiker";	
	}	
	
	public function postChange($id){
		if (!Auth::check()){
			return Redirect::to('user/login')->with('message', 'Gelive in te loggen om deze pagina te bekijken!');
    	}
    	
    	$rules = array(
	    	'firstname'=>'required|min:2',
		    'lastname'=>'required|min:2',
		    'email'=>'required|email'
	    );
    	
        $validator = Validator::make(Input::all(), $rules);
 
	    if ($validator->passes()) {
		    $user = User::find($id);
		    $user->firstname = Input::get('firstname');
		    $user->lastname = Input::get('lastname');
		    $user->email = Input::get('email');
		    $user->save();
		 
		    return Redirect::to('user')->with('message', 'Gebruiker gewijzigd!');
	    } else {
	         return Redirect::to('user/change/'.$id)->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }
	}
	
	public function getChangepassword($id){
		if (!Auth::check()){
			return Redirect::to('user/login')->with('message', 'Gelive in te loggen om deze pagina te bekijken!');
    	}
	
		$data['user'] = User::find($id);
		$this->layout->content = View::make('user.changepassword', $data);
	    $this->layout->title = "Wijzig Wachtwoord";	
	}
	
	public function postChangepassword($id){
		if (!Auth::check()){
			return Redirect::to('user/login')->with('message', 'Gelive in te loggen om deze pagina te bekijken!');
    	}
    	
    	$rules = array(
		    'password'=>'required|alpha_num|between:6,12',
		    'passwordAgain'=>'required|alpha_num|same:password'
	    );
    	
        $validator = Validator::make(Input::all(), $rules);
 
	    if ($validator->passes()) {
		    $user = User::find($id);
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();
		 
		    return Redirect::to('user/logout');
		    } else {
	         return Redirect::to('user/changepassword/'.$id)->with('message', 'Enkele dingen gingen mis:')->withErrors($validator)->withInput();   
	    }
	}	
	
	public function getDelete($id){
		if (!Auth::check()){
			return Redirect::to('user/login')->with('message', 'Gelive in te loggen om deze pagina te bekijken!');
    	}
    	
		User::destroy($id);
		return Redirect::to('user')->with('message', 'Gebruiker verwijderd!');
	}
}
?>