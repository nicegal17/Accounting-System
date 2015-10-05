<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Login extends Model {
	public static function userLogin($data){
		return DB::insert('SELECT * FROM tbl_useracct WHERE ',
			array($data['acctCode'],$data['acctTitle'],$data['acctType'],$data['norm'],$data['statement'],$data['fund']));
	}
}				