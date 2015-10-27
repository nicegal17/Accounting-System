<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Login extends Model {

	public static function userLogin($data){
		return DB::insert('SELECT * FROM tbl_useracct WHERE ',
			array($data['acctCode'],$data['acctTitle'],$data['acctType'],$data['norm'],$data['statement'],$data['fund']));
	}

	public static function authenticate($data){
		return DB::select('SELECT U.userID,E.empID,U.username, E.empName,E.idPosition,
			(SELECT posName FROM tbl_position WHERE idPosition = E.idPosition) AS empPosition 
			FROM tbl_useracct U INNER JOIN tbl_employee E ON E.empID = U.empID 
			WHERE username=? AND password=? LIMIT 1;',array($data['username'],$data['password']));
	}
}				