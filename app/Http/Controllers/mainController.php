<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class mainController extends BaseController 
{
    use DispatchesJobs, ValidatesRequests;


    public function getviewMain(){
        //$user1 = Session::get('user');
    	//return response()->json(array('user'=>$user1));

        //if (Auth::check()) {
   		return view('main'); 
		// }else{
		// 	return redirect()->intended('/');
		// }    	
    }
}
