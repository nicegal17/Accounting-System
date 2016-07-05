<?php
namespace App\Http\Controllers;

use App\Models\JVoucher;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class JVController extends BaseController{ 
	
	public function getAcctTitles(){
		$data = JVoucher::getAcctTitles();
		return response()->json($data);
	}

	public function createJV(Request $request){
		$input = $request->all();
	    $data = JVoucher::createJV($input);
		return response()->json($data);
	}

	public function getJVs(){
		$data = JVoucher::getJVs();
		return response()->json($data);
	}

	public function getJVDetails(Request $request,$id){
		$data = JVoucher::getJVDetails($id);
		return response()->json($data);
	}

	public function updateJV(Request $request,$id){
		$input = $request->all();
		$data = JVoucher::updateJV($id,$input);
		return response()->json($data);
	}

	public function approveJV(Request $request,$id){
		$input = $request->all();
		$data = JVoucher::approveJV($id,$input);
		return response()->json($data);
	}

	public function cancelJV(Request $request,$id){
		$input = $request->all();
		$data = JVoucher::cancelJV($id,$input);
		return response()->json($data);
	}

	public function auditJV(Request $request,$id){
		$input = $request->all();
		$data = JVoucher::auditJV($id,$input);
		return response()->json($data);
	}

	public function previewJV(Request $request,$id){
		$data = JVoucher::previewJV($id);
		return response()->json($data);
	}

	public function getJVPK(Request $request,$id){
		$data = JVoucher::getJVPK($id);
		return response()->json($data);
	}

	public function updateJVEntries(Request $request,$id){
		$input = $request->all();
		$data = JVoucher::updateJVEntries($id,$input);
		return response()->json($data);
	}

	public function getGJEntries(Request $request){
		$input = $request->all();
	    $data = JVoucher::getGJEntries($input['from'], $input['to']);
		return response()->json($data);
	}
}
?>
