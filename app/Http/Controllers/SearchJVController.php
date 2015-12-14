<?php
namespace App\Http\Controllers;

use App\Models\SearchJVs;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class SearchJVController extends BaseController{ 
	
	public function getJVNo(){
		$data = SearchJVs::getJVNo();
		return response()->json($data);
	}
	
	public function getJVDet($id){
		$data = SearchJVs::getJVDet($id);
		return response()->json($data);
	}

	public function getDBEntries($id){
		$data = SearchJVs::getDBEntries($id);
		return response()->json($data);
	}

	public function getCREntries($id){
		$data = SearchJVs::getCREntries($id);
		return response()->json($data);
	}
}
?>
