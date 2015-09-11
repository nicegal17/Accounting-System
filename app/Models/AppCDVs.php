<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class AppCDVs extends Model {

	public static function getCDVNo(){
		$tbl_cdv = DB::table('tbl_cdv')
					->where('status', '=', 'PEN')
					->get();

		return $tbl_cdv;
	}

	public static function getAcctEntries($CDVNo) {
		return DB::select('SELECT * FROM tbl_acctngEntries e LEFT JOIN tbl_acctchart a ON a.idAcctTitle = e.idAcctTitleDB OR a.idAcctTitle = e.idAcctTitleCR WHERE e.cdvID = ?',array($CDVNo));
	}

	public static function appCDV($CDVNo){
		return DB::update('UPDATE tbl_cdv SET status="APR" WHERE cdvID=?', array($CDVNo));
	}

	public static function denyCDV($CDVNo){
		return DB::update('UPDATE tbl_cdv SET status="DNY" WHERE cdvID=?', array($CDVNo));
	}
}	