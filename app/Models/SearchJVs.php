<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class SearchJVs extends Model {

	public static function getJVNo(){
		$tbl_gj = DB::table('tbl_gj')
					->get();

		return $tbl_gj;
	}

	public static function getAcctEntries($JID) {
		return DB::select('SELECT * FROM tbl_journalentries e LEFT JOIN tbl_acctchart a ON a.idAcctTitle = e.idAcctTitleDB OR a.idAcctTitle = e.idAcctTitleCR WHERE e.JID = ?',array($JID));
	}
}	