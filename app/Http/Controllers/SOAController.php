<?php
namespace App\Http\Controllers;

use App\Models\SOAs;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class SOAController extends BaseController{ 

	public function getInfo(Request $request,$id){
		$data = SOAs::getInfo($id);
		return response()->json($data);
	}
}
?>
