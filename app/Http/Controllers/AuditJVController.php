<?php
namespace App\Http\Controllers;

use App\Models\AuditJVs;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class AuditJVController extends BaseController{ 
	
	public function getJVNo(){
		$data = AuditJVs::getJVNo();
		return response()->json($data);
	}

	public function getAcctEntries($id){
		$data = AuditJVs::getAcctEntries($id);
		return response()->json($data);
	}

	public function AuditJV(Request $request, $id){
		$input = $request->all();
		$data = AuditJVs::AuditJV($id,$input);
		return response()->json($data);
	}
}
?>
