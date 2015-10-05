<?php
namespace App\Http\Controllers;

use App\Models\AppAPVs;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class AppAPVController extends BaseController{ 
	
	public function getAPVNo(){
		$data = AppAPVs::getAPVNo();
		return response()->json($data);
	}

	public function getAcctEntries($id){
		$data = AppAPVs::getAcctEntries($id);
		return response()->json($data);
	}

	// public function approveJV(Request $request, $id){
	// 	$input = $request->all();
	// 	$data = AppJVouchers::approveJV($id,$input);
	// 	return response()->json($data);
	// }

	// public function denyJV(Request $request, $id){
	// 	$input = $request->all();
	// 	$data = AppJVouchers::denyJV($id,$input);
	// 	return response()->json($data);
	// }
}
?>
