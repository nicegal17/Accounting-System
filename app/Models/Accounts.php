<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

// Filename is same sa class name dapat
class Accounts extends Model {

	public static function getFunds(){
		$tbl_fund = DB::table('tbl_fund')->get();

		return $tbl_fund;
	}

	public static function getAcctTypes(){
		$tbl_acctGroup = DB::table('tbl_acctGroup')->get();

		return $tbl_acctGroup;
	}
}				