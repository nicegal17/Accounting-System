<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\User;
use Auth;
use Validator;
use JWTAuth;
use JWTFactory;
use Tymon\JWTAuth\PayloadFactory;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class loginController extends BaseController 
{
    use DispatchesJobs, ValidatesRequests;
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


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
            $user = $user[0];
            $users = User::find($user->userID);            
            $token = JWTAuth::fromUser($users);
            if ($token) {
                return response()->json(array('url'=>'/main','success'=>true,'msg'=>'','user'=>$user,'token'=> $token));
            }else{
                return response()->json(array('url'=>'/main','success'=>true,'msg'=>'Login Failed'));
            }
        }else{
            return response()->json(array('url'=>'/','success'=>false,'msg'=>'Username and Password incorrect'));
        }
    }

    public function logoutAuth(){
    	Auth::logout();
        Session::forget('user');
        return response()->json(array('url'=>'/','success'=>true,'msg'=>'Successfully logout'));
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
