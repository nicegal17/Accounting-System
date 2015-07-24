<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class CheckDisbursements extends Model {

	public static function getBanks(){
		$tbl_bank = DB::table('tbl_bank')->get();

		return $tbl_bank;	
	}

	public static function getAccountNo(){
		$tbl_bankAcct = DB::table('tbl_bankAcct')->get();

		return $tbl_bankAcct;	
	}

	public static function getAcctTitles(){
		$tbl_acctchart = DB::table('tbl_acctchart')->get();

		return $tbl_acctchart;	
	}
}