<?php
namespace App\Http\Controllers;

use App\Models\AuditAPVs;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class AuditAPVController extends BaseController{ 
	
	public function getAPV(){
		$data = AuditAPVs::getAPV();
		return response()->json($data);
	}

	public function getAcctEntries($id){
		$data = AuditAPVs::getAcctEntries($id);
		return response()->json($data);
	}

	public function auditAPV(Request $request, $id){
		$input = $request->all();
		$data = AuditAPVs::auditAPV($id,$input);
		return response()->json($data);
	}
}
?>
