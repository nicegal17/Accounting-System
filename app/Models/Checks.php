<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Checks extends Model {

	public static function createCheck($data){
		$userID = $data['userID'];

		$result = DB::insert('INSERT INTO tbl_checks(Items, amount, check_date, userID) VALUES(?,?,?,?)',
			array($data['Items'],$data['amount'],$data['dt'],$userID);

		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'New record has been added';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while saving the record';
		}
		return $results;
	}
}				