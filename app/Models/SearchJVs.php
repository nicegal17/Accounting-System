<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class SearchJVs extends Model {

	public static function getJVNo(){
		return DB::select('SELECT a.JID, a.JVNum
					FROM tbl_gj a ORDER BY a.JID ASC ');
	}

	public static function getJVDet($JVNum) {
		return DB::select('SELECT a.JID, a.JVNum, a.particulars, b.empName, a.transDate
						FROM tbl_gj a 
						LEFT JOIN tbl_useracct c ON c.userID=a.prepBy
						LEFT JOIN tbl_employee b ON b.empID=c.empID
						WHERE a.JID = ?',array($JVNum));
	}

	public static function getDBEntries($JVNum) {
			return DB::select('SELECT a.JID, b.acctTitle, e.amount, e.idAcctTitleDB
						FROM tbl_gj a 
						LEFT JOIN tbl_journalentries e ON a.JID=e.JID
						LEFT JOIN tbl_acctchart b ON b.idAcctTitle = e.idAcctTitleDB 
						WHERE e.idAcctTitleDB IS NOT NULL AND a.JID = ?',array($JVNum));
	}

	public static function getCREntries($JVNum) {
			return DB::select('SELECT a.JID, b.acctTitle, e.amount, e.idAcctTitleCR
						FROM tbl_gj a 
						LEFT JOIN tbl_journalentries e ON a.JID=e.JID
						LEFT JOIN tbl_acctchart b ON b.idAcctTitle = e.idAcctTitleCR  
						WHERE e.idAcctTitleCR IS NOT NULL AND a.JID = ?',array($JVNum));
	}
}	