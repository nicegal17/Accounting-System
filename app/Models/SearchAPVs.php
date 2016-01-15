<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class SearchAPVs extends Model {

	public static function getAPVNo(){
		return DB::select('SELECT a.apvID, a.APVNum, a.transDate, a.particulars, b.empName 
					FROM tbl_apv a
					LEFT JOIN tbl_useracct c ON c.userID=a.prepBy
					LEFT JOIN tbl_employee b ON b.empID=c.empID ORDER BY a.apvID ASC ');
	}

	public static function getAPVDet($apvID) {
		return DB::select('SELECT a.apvID, a.APVNum, a.particulars, b.empName, a.transDate
						FROM tbl_apv a 
						LEFT JOIN tbl_useracct c ON c.userID=a.prepBy
						LEFT JOIN tbl_employee b ON b.empID=c.empID
						WHERE a.apvID = ?',array($apvID));
	}

	public static function getDBEntries($apvID) {
			return DB::select('SELECT a.apvID, b.acctTitle, e.amount, e.idAcctTitleDB
						FROM tbl_apv a 
						LEFT JOIN tbl_apventries e ON a.apvID=e.apvID
						LEFT JOIN tbl_acctchart b ON b.idAcctTitle = e.idAcctTitleDB 
						WHERE e.idAcctTitleDB IS NOT NULL AND a.apvID = ?',array($apvID));
	}

	public static function getCREntries($apvID) {
			return DB::select('SELECT a.apvID, b.acctTitle, e.amount, e.idAcctTitleCR, f.empName
						FROM tbl_apv a 
						LEFT JOIN tbl_apventries e ON a.apvID=e.apvID
						LEFT JOIN tbl_acctchart b ON b.idAcctTitle = e.idAcctTitleCR  
						LEFT JOIN tbl_useracct c ON c.userID=a.approveBy
						LEFT JOIN tbl_employee f ON f.empID=c.empID
						WHERE e.idAcctTitleCR IS NOT NULL AND a.apvID = ?',array($apvID));
	}
}	