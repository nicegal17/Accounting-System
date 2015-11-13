<?php 

namespace App\Http\Controllers;

use App\Models\Users; 

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class UserController extends BaseController{ 

	public function createUser(Request $request){
		$input = $request->all();
		$data = Users::createUser($input);
		return response()->json($data);
	}
	
	public function getAllUsers(){
		$data = Users::getAllUsers();
		return response()->json($data);
	}

	public function getUserID(Request $request,$id){
		$data = Users::getUserID($id);
		return response()->json($data);
	}

	public function updateUser(Request $request,$id){
		$input = $request->all();
		$data = Users::updateUser($id,$input);
		return response()->json($data);
	}

	public function deleteUser($id){
		$data = Users::deleteUser($id);
		return response()->json($data);
	}

}
?>
