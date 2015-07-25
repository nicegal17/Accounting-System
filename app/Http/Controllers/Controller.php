<?php 

namespace App\Http\Controllers;

use App\Models\Employees; // e Inherit daun nmu ang imong gusto nga model sa controller
use App\Models\Branches;
use App\Models\CheckDisbursements;
use App\Models\Positions;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

//By Default dli jd na nmu hilabtan ang BAseController
class Controller extends BaseController{ 

	public function getPosition(){
		$data = Employees::getPosition();
		return response()->json($data);
	}

	public function getPosID(Request $request,$id){
		$data = Employees::getPosID($id);
		return response()->json($data);
	}

	public function createGroups(Request $request){
		$input = $request->all();
		// $input = array('data'=>array($input['acctType'],$input['acctGroup'],$input['groupCode']));
		$data = Users::createGroups($input);
		return response()->json($data);
	}

	public function getEmployees(){
		$data = Employees::getEmployees();
		return response()->json($data); //always JSON ang response
	}

	//branch
	public function createBranch(Request $request){
		$input = $request->all();
		$data = Branches::createBranch($input);
		return response()->json($data);
	}

	public function getBranches(){
		$data = Branches::getBranches();
		return response()->json($data);
	}

	public function getBranchByID(Request $request,$id){
		$data = Branches::getBranchID($id);
		return response()->json($data);
	}

	public function updateBranch(Request $request,$id){
		$input = $request->all();
		$data = Branches::updateBranch($id,$input);
		return response()->json($data);
	}

	public function deleteBranch($id){
		$data = Branches::deleteBranch($id);
		return response()->json($data);
	}


	//Position
	public function createPosition(Request $request){
		$input = $request->all();
		$data = Positions::createPosition($input);
		return response()->json($data);
	}

	//CDV

	public function getBanks(){
		$data = CheckDisbursements::getBanks();
		return response()->json($data);
	}

	public function getAccountNo(){
		$data = CheckDisbursements::getAccountNo();
		return response()->json($data);
	}

	public function getAcctTitles(){
		$data = CheckDisbursements::getAcctTitles();
		return response()->json($data);
	}
}
?>
