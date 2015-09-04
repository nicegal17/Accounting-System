<?php
namespace App\Http\Controllers;

use App\Models\Balances;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class BeginBalController extends BaseController{ 

	public function getAcctTitles(){
		$data = Balances::getAcctTitles();
		return response()->json($data);
	}
	
	public function createBeginBal(Request $request){
		$input = $request->all();
		$data = Balances::createBeginBal($input);
		return response()->json($data);
	}

}
?>
