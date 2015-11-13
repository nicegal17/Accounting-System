<?php
namespace App\Http\Controllers;

use App\Models\Checks;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class CheckController extends BaseController{ 
	
	public function createCheck(Request $request){
		$input = $request->all();
		$data = Checks::createCheck($input);
		return response()->json($data);
	}
}
?>
