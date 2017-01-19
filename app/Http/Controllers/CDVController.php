<?php
namespace App\Http\Controllers;

use App\Models\CheckDisbursements;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Barryvdh\Debugbar;

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

	public function getCDVByID(Request $request,$id){
		$data = CheckDisbursements::getCDVByID($id);
		return response()->json($data);
	}

	public function getCDVDetails(Request $request,$id){
		$data = CheckDisbursements::getCDVDetails($id);
		return response()->json($data);
	}

	public function getCDVEntries(Request $request,$id){
		$data = CheckDisbursements::getCDVEntries($id);
		return response()->json($data);
	}

	public function getCDVNum(){
		$data = CheckDisbursements::getCDVNum();
		return response()->json($data);
	}

	public function createCDV(Request $request){
		$input = $request->all();
	    $data = CheckDisbursements::createCDV($input);
		return response()->json($data);
	}

	public function updateCDV(Request $request,$id){
		$input = $request->all();
		$data = CheckDisbursements::updateCDV($id,$input);
		return response()->json($data);
	}

	public function previewCDV(Request $request,$id){
		$data = CheckDisbursements::previewCDV($id);
		return response()->json($data);
	}

	public function approveCDV(Request $request,$id){
		$input = $request->all();
		$data = CheckDisbursements::approveCDV($id,$input);
		return response()->json($data);
	}

	public function cancelCDV(Request $request,$id){
		$input = $request->all();
		$data = CheckDisbursements::cancelCDV($id,$input);
		return response()->json($data);
	}

	public function auditCDV(Request $request,$id){
		$input = $request->all();
		$data = CheckDisbursements::auditCDV($id,$input);
		return response()->json($data);
	}

	public function getCDVInfo(Request $request){
		// $sdate1 = Input::get('sdate1');\\

		// $sdate1 = $request->input('sdate1');
		$sdate1 = $request->query('sdate1');
		Debugbar::info($sdate1);
		Debugbar::startMeasure('render','Time for rendering');
		try {
   			 throw new Exception('foobar');
		} catch (Exception $e) {
    		Debugbar::addException($e);
		}
		$data = CheckDisbursements::getCDVInfo($sdate1);
		return response()->json($data);
	}
}
?>
