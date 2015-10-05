<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class AppJVouchers extends Model {

	public static function getJVNo(){
		$tbl_gj = DB::table('tbl_gj')
					->where('status', '=', 'PEN')
					->get();

		return $tbl_gj;
	}

	public static function getAcctEntries($JID) {
		return DB::select('SELECT * FROM tbl_journalEntries e LEFT JOIN tbl_acctchart a ON a.idAcctTitle = e.idAcctTitleDB OR a.idAcctTitle = e.idAcctTitleCR WHERE e.JID=?',array($JID));
	}

	public static function approveJV($JID){
		return DB::update('UPDATE tbl_gj SET status="APR" WHERE JID=?', array($JID));
	}

	public static function denyJV($JID){
		return DB::update('UPDATE tbl_gj SET status="DNY" WHERE JID=?', array($JID));
	}
}	