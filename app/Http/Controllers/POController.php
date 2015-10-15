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

	public function getBranch(){
		$data = PurchaseOrders::getBranch();
		return response()->json($data);
	}

	public function getBank(){
		$data = PurchaseOrders::getBank();
		return response()->json($data);
	}

	public function getBranchNames(){
		$data = PurchaseOrders::getBranchNames();
		return response()->json($data);
	}

	public function getSupplier2(){
		$data = PurchaseOrders::getSupplier2();
		return response()->json($data);
	}

	public function getUnit(){
		$data = PurchaseOrders::getUnit();
		return response()->json($data);
	}

	public function getMOP(){
		$data = PurchaseOrders::getMOP();
		return response()->json($data);
	}

	public function createPO(Request $request){
		$input = $request->all();
	    $data = PurchaseOrders::createPO($input);
		return response()->json($data);
	}

	public function getPOLists(){
		$data = PurchaseOrders::getPOLists();
		return response()->json($data);
	}
}
?>
