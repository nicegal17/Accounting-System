<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Users extends Model {
	
	public static function createUser($data){
		//  $encrypt_pass = Crypt::encrypt($data['password']);

		$result = DB::table('tbl_userAcct')->insert(['empID' => ($data['employee']),'username' => ($data['username']),'password' => ($data['password']),'role_title' => ($data['role'])]);
		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'New user has been successfully created';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while saving the record';
		}
		return $results;
	}

	public static function getEmployees() {
		return DB::select('SELECT empID, empName FROM tbl_employee');
	}

	public static function getAllUsers(){
		$tbl_userAcct = DB::table('tbl_userAcct')
		->leftJoin('tbl_employee', 'tbl_employee.empID', '=', 'tbl_userAcct.empID')
		->leftJoin('tbl_roles', 'tbl_roles.roleID', '=', 'tbl_useracct.role_title')
		->get();

		return $tbl_userAcct;
	}

	public static function getUserRoles() {
		return DB::select('SELECT roleID, role_title FROM tbl_roles');
	}

	public static function getUserID($id){
		return DB::select('SELECT b.userID, a.empID, a.empName, b.username, b.password, c.roleID, c.role_title FROM tbl_employee a 
			LEFT JOIN tbl_useracct b ON a.empID=b.empID 
			LEFT JOIN tbl_roles c ON c.roleID=b.role_title
			WHERE b.userID=?',array($id));
	}

	public static function updateUser($id,$data) {		
		$result = DB::table('tbl_useracct')->where('userID',$id)
					->update([
						'empID' => $data['empID'],
						'username' => $data['username'],
						'password' => $data['password'],
						'role_title' => $data['role']
					]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'User Account has been updated';
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