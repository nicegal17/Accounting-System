<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Assets extends Model {

	public static function getCategories(){
		$tbl_category = DB::table('tbl_category')->get();

		return $tbl_category;
	}

	public static function getPeriods(){
		$tbl_acctperiod = DB::table('tbl_acctperiod')->get();

		return $tbl_acctperiod;
	}

	public static function createAsset($data){

		$result = DB::insert('INSERT INTO tbl_assetinfo(itemName,cost,datePurchased,estLife,qty,categoryID,idPeriod,postedDate) VALUES(?,?,?,?,?,?,?,NOW())',
			array($data['itemName'],$data['cost'],$data['dt'],$data['estLife'],$data['qty'],$data['category'],$data['period']));

		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'Record Successfully Saved';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while saving the record';
		}
		return $results;
	}
}				