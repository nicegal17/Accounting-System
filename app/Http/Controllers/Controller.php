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
		$data = Users::createGroups($input);
		return response()->json($data);
	}

	public function getEmployees(){
		$data = Employees::getEmployees();
		return response()->json($data); //always JSON ang response
	}
	//Position
	public function createPosition(Request $request){
		$input = $request->all();
		$data = Positions::createPosition($input);
		return response()->json($data);
	}
}
?>
