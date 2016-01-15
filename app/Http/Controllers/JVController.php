<?php
namespace App\Http\Controllers;

use App\Models\JVoucher;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class JVController extends BaseController{ 
	
	public function getAcctTitles(){
		$data = JVoucher::getAcctTitles();
		return response()->json($data);
	}

	public function createJV(Request $request){
		$input = $request->all();
	    $data = JVoucher::createJV($input);
		return response()->json($data);
	}

	public function getGJEntries(Request $request){
		$input = $request->all();
	    $data = JVoucher::getGJEntries($input['from'], $input['to']);
		return response()->json($data);
	}
}
?>
