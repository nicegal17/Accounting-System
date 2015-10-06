<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class loginController extends BaseController 
{
    use DispatchesJobs, ValidatesRequests;


    public function getViewLogin(){
       	if (Auth::check()) {
	   		return redirect()->intended('/main');
		}else{
			return view('login'); 
		}   
    }


    public function loginAuth(Request $request){
    	$input = $request->all();

    	if (Auth::attempt(['email' => $input['username'], 'password' => $input['password']])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }else{

        }
    }

    public function logoutAuth(){
    	Auth::logout();
    }

    public function getCurrentUser(Request $request){    	
    	if ($request->user()) {
            $user = $request->user();
        }else{
        	$user = Auth::user();
        }
    	return response()->json($user);
    }

}
