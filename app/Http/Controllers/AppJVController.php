<?php
namespace App\Http\Controllers;

use App\Models\AppJVouchers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class AppJVController extends BaseController{ 
	
	public function getJVNo(){
		$data = AppJVouchers::getJVNo();
		return response()->json($data);
	}

	public function getAcctEntries($id){
		$data = AppJVouchers::getAcctEntries($id);
		return response()->json($data);
	}

	public function approveJV(Request $request, $id){
		$input = $request->all();
	    $data = AppJVouchers::approveJV($id,$input);
		return response()->json($data);
	}

	public function denyJV(Request $request, $id){
		$input = $request->all();
		$data = AppJVouchers::denyJV($id,$input);
		return response()->json($data);
	}

	public function getGJEntries(Request $request, $dateParams){
		// $data = AppJVouchers::getGJEntries($dtFrom);
		$input = $request->all();
		  $data = AppJVouchers::getGJEntries($dateParams,$input);
		return response()->json($input);
	}
}
?>
