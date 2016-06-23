<?php
namespace App\Http\Controllers;

use App\Models\APVs;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class APVController extends BaseController{ 
	
	public function getAPV(){
		$data = APVs::getAPV();
		return response()->json($data);
	}

	public function getAcctTitles(){
		$data = APVs::getAcctTitles();
		return response()->json($data);
	}

	public function createAPV(Request $request){
		$input = $request->all();
	    $data = APVs::createAPV($input);
		return response()->json($data);
	}

	public function getAPVDetails(Request $request,$id){
		$data = APVs::getAPVDetails($id);
		return response()->json($data);
	}

	public function updateAPV(Request $request,$id){
		$input = $request->all();
		$data = APVs::updateAPV($id,$input);
		return response()->json($data);
	}

	public function approveAPV(Request $request,$id){
		$input = $request->all();
		$data = APVs::approveAPV($id,$input);
		return response()->json($data);
	}

	public function cancelAPV(Request $request,$id){
		$input = $request->all();
		$data = APVs::cancelAPV($id,$input);
		return response()->json($data);
	}

	public function auditAPV(Request $request,$id){
		$input = $request->all();
		$data = APVs::auditAPV($id,$input);
		return response()->json($data);
	}

	public function previewAPV(Request $request,$id){
		$data = APVs::previewAPV($id);
		return response()->json($data);
	}

}
?>
