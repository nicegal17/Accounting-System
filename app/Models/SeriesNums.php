<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class SeriesNums extends Model {

	public static function getSeriesNum(){
		$tbl_series = DB::table('tbl_series')->get();

		return $tbl_series;
	}

	public static function getSeriesDet($id){
		return DB::select('SELECT * FROM tbl_series WHERE idNum=?', array($id));
	}

	public static function updateNumSeries($id,$data){
		
		$result = DB::table('tbl_series')->where('idNum', $id)
				->update([
					'numSeries' => $data['numSeries'],
					'Description' => $data['Description'],
					'ABRV' => $data['ABRV']
					]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Record Successfully Updated';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while updating the record';
		}
		return $results;

	}
}