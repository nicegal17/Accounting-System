<?php
namespace App\Http\Controllers;

use App\Models\APVs;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class APVController extends BaseController{ 
	
	public function getAcctTitles(){
		$data = APVs::getAcctTitles();
		return response()->json($data);
	}

	public function createAPV(Request $request){
		$input = $request->all();
	    $data = APVs::createAPV($input);
		return response()->json($data);
	}
}
?>
