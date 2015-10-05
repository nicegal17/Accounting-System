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

	public function getAcctEntries($id){
		$data = SearchJVs::getAcctEntries($id);
		return response()->json($data);
	}
}
?>
