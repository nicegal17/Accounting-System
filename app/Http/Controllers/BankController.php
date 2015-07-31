<?php
namespace App\Http\Controllers;

use App\Models\Banks;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class BankController extends BaseController{ 
	
	public function createBank(Request $request){
		$input = $request->all();
		$data = Banks::createBank($input);
		return response()->json($data);
	}
}
?>
