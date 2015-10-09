<?php
namespace App\Http\Controllers;

use App\Models\PurchaseOrders;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class POController extends BaseController{ 
	
	public function getSupplier(){
		$data = PurchaseOrders::getSupplier();
		return response()->json($data);
	}
}
?>
