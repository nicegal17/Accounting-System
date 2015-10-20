<?php 

namespace App\Http\Controllers;

use App\Models\PODetails;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class PODetController extends BaseController{ 

	public function getPODetails(Request $request,$id){
		$data = PODetails::getPODetails($id);
		return response()->json($data);
	}

	public function getPOItems(Request $request,$id){
		$data = PODetails::getPOItems($id);
		return response()->json($data);
	}

	public function selectSUM(Request $request,$id){
		$data = PODetails::selectSUM($id);
		return response()->json($data);
	}
}
?>
