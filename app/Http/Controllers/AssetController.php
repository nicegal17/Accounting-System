<?php
namespace App\Http\Controllers;

use App\Models\Assets;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class AssetController extends BaseController{ 

	public function getCategories(){
		$data = Assets::getCategories();
		return response()->json($data);
	}

	public function getPeriods(){
		$data = Assets::getPeriods();
		return response()->json($data);
	}

	public function getAssets(){
		$data = Assets::getAssets();
		return response()->json($data);
	}

	public function createAsset(Request $request){
		$input = $request->all();
		$data = Assets::createAsset($input);
		return response()->json($data); 
	}

	public function getAssetItem(Request $request,$id){
		$data = Assets::getAssetItem($id);
		return response()->json($data);
	}
}
?>
