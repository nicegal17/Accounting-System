<?php

class UserAccountController extends BaseController {
	public function Login(){
		$data = Input::all();
		$rules = array(
			'username' => 'required|username',
			'password' => 'required|min:6',
			);


		$validator = Validator::make($data, $rules);
		if ($validator->fails()){
			return Redirect::to('/login')->withInput(Input::except('password'))->withErrors($validator);
		}else{
			$userdata = array(
				'email' => Input::get('email'),
		    	'password' => Input::get('password')
		    );

		    if (Auth::validate($userdata)) {
		    	if (Auth::attempt($userdata)) {
		    		return Redirect::intended('/');
		    	}
		    } else {
		    	 Session::flash('error', 'Something went wrong'); 
        		 return Redirect::to('login');
		    }
		}
	}
}
?>