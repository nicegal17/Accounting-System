<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

// Filename is same sa class name dapat
class Users extends Model {

	public static function getUsers(){
		$tbl_employee = DB::table('tbl_employee')->get();

		return $tbl_employee;
	}

	public static function createUser($data){
		$result = DB::insert('INSERT INTO tbl_userAcct(empID,UName,Pwd) VALUES (?,?,?)',
			array($data['empName'],$data['UName'],$data['Pwd']));

		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'Record Successfully Saved';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while saving the record';
		}
		return $results;
	}

	public static function getAllUsers(){
		$tbl_userAcct = DB::table('tbl_userAcct')
		->leftJoin('tbl_employee', 'tbl_employee.empID', '=', 'tbl_userAcct.empID')
		->get();

		return $tbl_userAcct;
	}

	public static function getUserID($id){
		$result = DB::select('SELECT * FROM tbl_useracct WHERE userID=?',array($id));
		/*$result = DB::table('tbl_useracct')
		->leftJoin('tbl_employee', 'tbl_employee.empID', '=', 'tbl_userAcct.empID')
		->where('tbl_userAcct.userID=?',array($id))
		->get();*/

		/*$result = DB::table('tbl_userAcct')
				->leftjoin('tbl_employee', 'tbl_employee.empID', '=', 'tbl_userAcct.empID')
				->select('tbl_userAcct.*', 'tbl_employee.empName')
				->where('tbl_employee.userID=?',array($id))
				->get();*/
		return $result;
	}
}