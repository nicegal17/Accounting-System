<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Checks extends Model {

	public static function createCheck($data){

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