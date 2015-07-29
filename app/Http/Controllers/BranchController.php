<?php
namespace App\Http\Controllers;

use App\Models\Branches;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class BranchController extends BaseController{ 
	
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
}
?>
