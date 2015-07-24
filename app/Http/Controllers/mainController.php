<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class mainController extends BaseController 
{
    use DispatchesJobs, ValidatesRequests;


    public function getviewMain(){
    	return view('main'); 
    }
}
