<?php
namespace App\Http\Controllers;

use App\Models\OReceipts;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ORController extends BaseController{ 
	
	public function getPayer(){
		$data = OReceipts::getPayer();
		return response()->json($data);
	}

	public function saveOR(Request $request){
		$input = $request->all();
	    $data = OReceipts::saveOR($input);
		return response()->json($data);
	}
}
?>
