<?php
namespace App\Http\Controllers;

use App\Models\SearchCDVs;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class SearchCDVController extends BaseController{ 
	
	public function getCDVNo(){
		$data = SearchCDVs::getCDVNo();
		return response()->json($data);
	}

	public function getCDVDet($id){
		$data = SearchCDVs::getCDVDet($id);
		return response()->json($data);
	}

	public function getDBEntries($id){
		$data = SearchCDVs::getDBEntries($id);
		return response()->json($data);
	}

	public function getCREntries($id){
		$data = SearchCDVs::getCREntries($id);
		return response()->json($data);
	}
}
?>
