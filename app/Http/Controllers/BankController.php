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

	public function getBanks(){
		$data = Banks::getBanks();
		return response()->json($data);
	}

	public function getBankByID(Request $request,$id){
		$data = Banks::getBankID($id);
		return response()->json($data);
	}

	public function updateBank(Request $request,$id){
		$input = $request->all();
		$data = Banks::updateBank($id,$input);
		return response()->json($data);
	}

	public function deleteBank($id){
		$data = Banks::deleteBank($id);
		return response()->json($data);
	}
}
?>
