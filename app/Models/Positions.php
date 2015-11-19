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
		$tbl_position = DB::table('tbl_position')->skip(10)->take(4)->get();

		return $tbl_position;
	}

	public static function getPosDetails($id){
		$result = DB::select('SELECT * FROM tbl_position WHERE idPosition=?',array($id));
		return $result;
	}

	public static function updatePosition($id, $data){
		$result = DB::table('tbl_position')->where('idPosition',$id)
					->update([
						'posName'=> $data['posName']
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
