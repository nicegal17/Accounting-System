<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Positions extends Model {

	public static function createPosition($data){
		$result = DB::insert('INSERT INTO tbl_position(posName) VALUES (?)',array($data['posName']));

		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'Record Successfully Saved';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while saving the record';
		}
		return $results;
	}

	public static function getPosition(){
		$tbl_position = DB::table('tbl_position')->get();

		return $tbl_position;
	}
}
