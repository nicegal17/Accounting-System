<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class AppAPVs extends Model {

	public static function getAPVNo(){
		$tbl_apv = DB::table('tbl_apv')
					->where('tranStatus', '=', 'PEN')
					->get();

		return $tbl_apv;
	}

	public static function getAcctEntries($apvID) {
		return DB::select('SELECT * FROM tbl_apventries e LEFT JOIN tbl_acctchart a ON a.idAcctTitle = e.idAcctTitleDB OR a.idAcctTitle = e.idAcctTitleCR WHERE e.apvID = ?',array($apvID));
	}

	// public static function approveJV($JID){
	// 	return DB::update('UPDATE tbl_gj SET status="APR" WHERE JID=?', array($JID));
	// }

	// public static function denyJV($JID){
	// 	return DB::update('UPDATE tbl_gj SET status="DNY" WHERE JID=?', array($JID));
	// }	
}	