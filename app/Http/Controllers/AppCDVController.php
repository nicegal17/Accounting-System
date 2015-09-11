<?php
namespace App\Http\Controllers;

use App\Models\AppCDVs;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
/*use Http\Input;
*/
class AppCDVController extends BaseController{ 
	
	public function getCDVNo(){
		$data = AppCDVs::getCDVNo();
		return response()->json($data);
	}

	public function getAcctEntries($id){
		$data = AppCDVs::getAcctEntries($id);
		return response()->json($data);
	}

	public function appCDV(Request $request, $id){
		$input = $request->all();
		$data = AppCDVs::appCDV($id,$input);
		return response()->json($data);
	}

	public function denyCDV(Request $request, $id){
		$input = $request->all();
		$data = AppCDVs::denyCDV($id,$input);
		return response()->json($data);
	}
}
?>
