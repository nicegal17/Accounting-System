<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class loginController extends BaseController 
{
    use DispatchesJobs, ValidatesRequests;


    public function getViewLogin(){
    	return view('login'); 
    }
}
