<?php
namespace App\Http\Controllers;

use App\Models\Accounts;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class AccountController extends BaseController{ 

	public function getFunds(){
		$data = Accounts::getFunds();
		return response()->json($data);
	}

	public function getAcctTypes(){
		$data = Accounts::getAcctTypes();
		return response()->json($data);
	}

	public function getNorms(){
		$data = Accounts::getNorms();
		return response()->json($data);
	}

	public function getFS(){
		$data = Accounts::getFS();
		return response()->json($data);
	}

	public function getAccountChart(){
		$data = Accounts::getAccountChart();
		return response()->json($data);
	}
	
	public function createAccount(Request $request){
		$input = $request->all();
		$data = Accounts::createAccount($input);
		return response()->json($data);
	}

	public function getAcctChartByID(Request $request,$id){
		$data = Accounts::getAcctChartByID($id);
		return response()->json($data);
	}

	public function updateAccount(Request $request, $id){
		$input = $request->all();
		$data = Accounts::updateAccount($id,$input);
		return response()->json($data);
	}

}
?>
