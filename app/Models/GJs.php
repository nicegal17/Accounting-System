<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class GJs extends Model {
	public static function getGJEntries($dateParams) {
		return DB::select('SELECT a.JID, a.JVNum, a.transDate, a.particulars, b.idAcctTitle, b.acctTitle, c.amount, c.idAcctTitleDB, 
					c.idAcctTitleCR 
					FROM tbl_gj a
					LEFT JOIN tbl_journalEntries c ON a.JID=c.JID
					LEFT JOIN tbl_acctchart b ON b.idAcctTitle=c.idAcctTitleDB OR b.idAcctTitle=c.idAcctTitleCR
					WHERE a.transDate =?',array($dateParams));
	}
}	
