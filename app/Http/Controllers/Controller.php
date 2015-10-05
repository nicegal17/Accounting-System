<?php 

namespace App\Http\Controllers;

use App\Models\Employees; // e Inherit daun nmu ang imong gusto nga model sa controller
use App\Models\Positions;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

//By Default dli jd na nmu hilabtan ang BAseController
class Controller extends BaseController{ 

	public function createGroups(Request $request){
		$input = $request->all();
		$data = Users::createGroups($input);
		return response()->json($data);
	}

	public function createPosition(Request $request){
		$input = $request->all();
		$data = Positions::createPosition($input);
		return response()->json($data);
	}
	public function updatePosition(Request $request,$id){
		$input = $request->all();
		$data = Positions::updatePosition($id,$input);
		return response()->json($data);
	}

	public function getPositionByID(Request $request,$id){
		$data = Positions::getPosDetails($id);
		return response()->json($data);
	}

	public function getPosition(){
		$data = Employees::getPosition();
		return response()->json($data);
	}

	public function getPosID(Request $request,$id){
		$data = Employees::getPosID($id);
		return response()->json($data);
	}

	public function getEmployees(){
		$data = Employees::getEmployees();
		return response()->json($data);
	}

	public function getEmployeeID(Request $request,$id){
		$data = Employees::getEmployeeID($id);
		return response()->json($data);
	}

	public function createEmployee(Request $request){
		$input = $request->all();
		$data = Employees::createEmployee($input);
		return response()->json($data);
	}

	public function updateEmployee(Request $request,$id){
		$input = $request->all();
		$data = Employees::updateEmployee($id,$input);
		return response()->json($data);
	}
}
?>
