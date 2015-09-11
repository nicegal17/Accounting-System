<?php
namespace App\Http\Controllers;

use App\Models\SearchCDVs;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
/*use Http\Input;
*/
class SearchCDVController extends BaseController{ 
	
	public function getCDVNo(){
		$data = SearchCDVs::getCDVNo();
		return response()->json($data);
	}

	public function getAcctEntries($id){
		$data = AppCDVs::getAcctEntries($id);
		return response()->json($data);
	}
}
?>
