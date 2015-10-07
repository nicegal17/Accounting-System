<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class mainController extends BaseController 
{
    use DispatchesJobs, ValidatesRequests;


    public function getviewMain(){
    	// $user = Auth::check();
    	// return response()->json($user);
  //   	if (Auth::check()) {

	   		 return view('main'); 
		// }else{
		// 	// return redirect()->intended('/');
		// }    	
    }
}
