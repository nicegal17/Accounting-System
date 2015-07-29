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
}