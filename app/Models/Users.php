<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Users extends Model {

	public static function getUsers(){
		$tbl_employee = DB::table('tbl_employee')->get();

		return $tbl_employee;
	}

	public static function createUser($data){
		$result = DB::insert('INSERT INTO tbl_useracct(empID,UName,Pwd) VALUES (?,?,?)',
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
		return DB::select('SELECT b.userID, a.empName, b.username, b.password FROM tbl_employee a LEFT JOIN tbl_useracct b ON a.empID=b.empID WHERE b.userID=?',array($id));
	}

	public static function updateUser($id,$data) {		
		$result = DB::table('tbl_useracct')->where('userID',$id)
					->update([
						'username'=> $data['username'],
						'password'=> $data['password']
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

	public static function deleteUser($id){
		$result = DB::table('tbl_useracct')->where('userID',$id)->delete();

		return $result;
	}
}