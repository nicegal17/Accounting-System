<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class SearchCDVs extends Model {

	public static function getCDVNo(){
		return DB::select('SELECT a.cdvID, a.CDVNo, a.transDate, a.particular, b.empName 
					FROM tbl_cdv a
					LEFT JOIN tbl_useracct c ON c.userID=a.prepBy
					LEFT JOIN tbl_employee b ON b.empID=c.empID ORDER BY a.cdvID ASC ');
	}

	public static function getCDVDet($CDVNo) {
		// return DB::select('SELECT a.cdvID, a.CDVNo, a.chkDate, a.particular, b.idAcctTitle, b.acctTitle, e.amount, e.idAcctTitleDB, e.idAcctTitleCR
		// 				FROM tbl_cdv a 
		// 				LEFT JOIN tbl_acctngEntries e ON a.cdvID=e.cdvID
		// 				LEFT JOIN tbl_acctchart b ON b.idAcctTitle = e.idAcctTitleDB OR b.idAcctTitle = e.idAcctTitleCR 
		// 				WHERE a.cdvID = ?',array($CDVNo));

		return DB::select('SELECT a.cdvID, a.CDVNo, a.chkDate, a.particular
						FROM tbl_cdv a 
						WHERE a.cdvID = ?',array($CDVNo));
	}

		public static function getDBEntries($CDVNo) {
			return DB::select('SELECT a.cdvID, b.acctTitle, e.amount, e.idAcctTitleDB
						FROM tbl_cdv a 
						LEFT JOIN tbl_acctngEntries e ON a.cdvID=e.cdvID
						LEFT JOIN tbl_acctchart b ON b.idAcctTitle = e.idAcctTitleDB 
						WHERE e.idAcctTitleDB IS NOT NULL AND a.cdvID = ?',array($CDVNo));
	}

	public static function getCREntries($CDVNo) {
			return DB::select('SELECT a.cdvID, b.acctTitle, e.amount, e.idAcctTitleCR
						FROM tbl_cdv a 
						LEFT JOIN tbl_acctngEntries e ON a.cdvID=e.cdvID
						LEFT JOIN tbl_acctchart b ON b.idAcctTitle = e.idAcctTitleCR  
						WHERE e.idAcctTitleCR IS NOT NULL AND a.cdvID = ?',array($CDVNo));
	}
}		
