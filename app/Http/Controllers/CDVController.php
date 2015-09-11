<?php
namespace App\Http\Controllers;

use App\Models\CheckDisbursements;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class CDVController extends BaseController{ 
	
	public function getBanks(){
		$data = CheckDisbursements::getBanks();
		return response()->json($data);
	}

	public function getAccountNo(){
		$data = CheckDisbursements::getAccountNo();
		return response()->json($data);
	}

	public function getAcctTitles(){
		$data = CheckDisbursements::getAcctTitles();
		return response()->json($data);
	}

	public function createCDV(Request $request){
		$input = $request->all();
		// $data = CheckDisbursements::createCDV($input);
		return response()->json($input);
	}
}
?>
