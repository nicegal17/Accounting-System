<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class JanineController extends BaseController 
// Dapat same ang name sa class ug sa file .. same sa Java 
{
    use DispatchesJobs, ValidatesRequests;


    public function getviewJanine(){
    	return view('janine'); //janine is mao na ang janine.php sa views
    }
}
