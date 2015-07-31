<?php 

namespace App\Http\Controllers;

use App\Models\Users; 

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

//By Default dli jd na nmu hilabtan ang BAseController
class UserController extends BaseController{ 

	public function getUsers(){
		$data = Users::getUsers();
		return response()->json($data);
	}

	public function getuserID(Request $request,$id){
		$data = Users::getPosID($id);
		return response()->json($data);
	}

	public function createUser(Request $request){
		$input = $request->all();
		$data = Users::createUser($input);
		return response()->json($data);
	}

	public function getAllUsers(){
		$data = Users::getAllUsers();
		return response()->json($data);
	}
}
?>
