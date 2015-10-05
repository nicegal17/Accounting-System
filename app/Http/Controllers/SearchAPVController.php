<?php
namespace App\Http\Controllers;

use App\Models\SearchAPVs;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class SearchAPVController extends BaseController{ 
	
	public function getAPVNo(){
		$data = SearchAPVs::getAPVNo();
		return response()->json($data);
	}

	public function getAcctEntries($id){
		$data = SearchAPVs::getAcctEntries($id);
		return response()->json($data);
	}
}
?>
