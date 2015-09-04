<?php
namespace App\Http\Controllers;

use App\Models\SubAccounts;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class SubAccountController extends BaseController{ 

	public function getAccountTitles(){
		$data = SubAccounts::getAccountTitles();
		return response()->json($data);
	}

	public function getNorms(){
		$data = SubAccounts::getNorms();
		return response()->json($data);
	}	

	public function getAcctTypes(){
		$data = SubAccounts::getAcctTypes();
		return response()->json($data);
	}	

	public function getFunds(){
		$data = SubAccounts::getFunds();
		return response()->json($data);
	}

	public function getFinStatements(){
		$data = SubAccounts::getFinStatements();
		return response()->json($data);
	}	

	public function createSubAcct(Request $request){
		$input = $request->all();
		$data = SubAccounts::createSubAccount($input);
		return response()->json($data);
	}
}
?>
