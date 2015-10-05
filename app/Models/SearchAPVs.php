<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class SearchAPVs extends Model {

	public static function getAPVNo(){
		$tbl_apv = DB::table('tbl_apv')
					->get();

		return $tbl_apv;
	}

	public static function getAcctEntries($apvID) {
		return DB::select('SELECT * FROM tbl_apventries e LEFT JOIN tbl_acctchart a ON a.idAcctTitle = e.idAcctTitleDB OR a.idAcctTitle = e.idAcctTitleCR WHERE e.apvID = ?',array($apvID));
	}
}	