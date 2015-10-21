<?php
namespace App\Http\Controllers;

use App\Models\SeriesNums;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class SeriesController extends BaseController{ 

	public function getSeriesNum(){
		$data = SeriesNums::getSeriesNum();
		return response()->json($data);
	}

	public function getSeriesDet(Request $request,$id){
		$data = SeriesNums::getSeriesDet($id);
		return response()->json($data);
	}

	public function updateNumSeries(Request $request, $id){
		$input = $request->all();
	    $data = SeriesNums::updateNumSeries($id,$input);
		return response()->json($data);
	}
}
?>
