<?php
namespace App\Http\Controllers;

use App\Models\JVoucher;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class JVController extends BaseController{ 
	
	public function getAcctTitles(){
		$data = JVoucher::getAcctTitles();
		return response()->json($data);
	}
}
?>
