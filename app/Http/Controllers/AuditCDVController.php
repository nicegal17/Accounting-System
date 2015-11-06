<?php
namespace App\Http\Controllers;

use App\Models\AuditCDVs;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class AuditCDVController extends BaseController{ 
	
	public function getCDVNo(){
		$data = AuditCDVs::getCDVNo();
		return response()->json($data);
	}

	public function getAcctEntries($id){
		$data = AuditCDVs::getAcctEntries($id);
		return response()->json($data);
	}

	public function auditCDV(Request $request, $id){
		$input = $request->all();
		$data = AuditCDVs::auditCDV($id,$input);
		return response()->json($data);
	}
}
?>
