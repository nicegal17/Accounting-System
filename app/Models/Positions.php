<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Positions extends Model {

	public function createPosition(){
		$result = DB::insert('INSERT INTO tbl_position(posName) VALUES (?)',
			[$data['posName']]);

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