<?php
namespace App\Http\Controllers;

use App\Models\CheckDisbursements;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class CDVController extends BaseController{ 
	
	public function getCDV(){
		$data = CheckDisbursements::getCDV();
		return response()->json($data);
	}

	public function getBanks(){
		$data = CheckDisbursements::getBanks();
		return response()->json($data);
	}

	public function getAcctTitles(){
		$data = CheckDisbursements::getAcctTitles();
		return response()->json($data);
	}

	public function getCDVID(Request $request,$id){
		$data = CheckDisbursements::getCDVID($id);
		return response()->json($data);
	}

	// public function getCDVNum(){
	// 	$data = CheckDisbursements::getCDVNum();
	// 	return response()->json($data);
	// }

	public function createCDV(Request $request){
		$input = $request->all();
	    $data = CheckDisbursements::createCDV($input);
		return response()->json($data);
	}

	public function getCDVInfo(Request $request){
		$input = $request->all();
	    $data = CheckDisbursements::getCDVInfo($input['from'], $input['to']);
		return response()->json($data);
	}
}
?>
