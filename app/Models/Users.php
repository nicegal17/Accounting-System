<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

// Filename is same sa class name dapat
class Users extends Model {

	public static function getPosition(){
		$tbl_position = DB::table('tbl_position')->get();

		return $tbl_position;	
	}

	public static function getAllGroups(){
		$tbl_employee = DB::table('tbl_employee')
		->leftJoin('tbl_position','tbl_employee.idPosition','=','tbl_position.idPosition')
		->get();

		return $tbl_employee;
	}

	public static function createGroups($data){
		$result = DB::insert('INSERT INTO tbl_employee(empName,empAddress,phoneNo,idPosition) VALUES (?,?,?,?)',
			[$data['empName'],$data['empAddress'],$data['phoneNo'],$data['position']]);

		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'Record Successfully Saved';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while saving the record';
		}
		return $results;
	}

	public static function getGroupById($id){
		$result = DB::table('tbl_employee')
				->join('tbl_position', function($join)
				{
					$join->on('tbl_employee.idPosition','=','tbl_position.idPosition')
						 ->where('tbl_employee.empID','=', array($id));
				})
				->get();
		return $result;
	}
}