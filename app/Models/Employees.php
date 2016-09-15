<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model {

	public static function getPosition(){
		$tbl_position = DB::table('tbl_position')->get();

		return $tbl_position;	
	}

	public static function createEmployee($data){
		$result = DB::insert('INSERT INTO tbl_employee(empName,empAddress,phoneNo,idPosition) VALUES (?,?,?,?)',
			[$data['empName'],$data['empAddress'],$data['phoneNo'],$data['position']]);

		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'New Employee has been added to the system.';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while saving the record';
		}
		return $results; 
	}

	public static function getEmployees(){
		$tbl_employee = DB::table('tbl_employee')
							->leftJoin('tbl_position','tbl_employee.idPosition','=','tbl_position.idPosition')
							->get();

		return $tbl_employee;
	}

	public static function getEmployeeID($id){
		return DB::select('SELECT a.empID, a.empName, a.empAddress, a.phoneNo, b.posName,b.idPosition FROM tbl_employee a LEFT JOIN tbl_position b ON b.idPosition=a.idPosition WHERE a.empID=?', array($id));
	}

	public static function updateEmployee($id,$data) {
		$result = DB::table('tbl_employee')->where('empID', $id)
					->update([
						'empName' => $data['empName'],
						'empAddress' => $data['empAddress'],
						'phoneNo' => $data['phoneNo'],
						'idPosition' => $data['position']
					]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Employee Details has been updated';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while updating the record';
		}
		return $results;
	} 
}