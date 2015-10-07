<?php

namespace App\Http\Controllers;

use App\Models\Login;

use Auth;
use Validator;
use Session;
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
            $data = array('message'=>Session::get('message'));            
			return view('login')->with($data); 
		}   
    }

    public function loginAuth(Request $request){
    	$input = $request->all();
        $user = Login::authenticate($input);
        if(isset($user) && !empty($user)){
            $result = Auth::loginUsingId($user[0]->userID);
            // $check = Auth::check();
            // return response()->json($result);

            if ($result) {
                return redirect('/main');
            }else{
                return redirect('/')->with('message', 'Login Failed');;
            }
        }else{
            return redirect('/')->with('message', 'Username and Password incorrect');;
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
