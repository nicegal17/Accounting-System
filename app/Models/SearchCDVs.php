<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class SearchCDVs extends Model {

	public static function getCDVNo(){
		return DB::select('SELECT a.cdvID, a.CDVNo, a.transDate, a.particular
					FROM tbl_cdv a ORDER BY a.cdvID ASC ');
	}

	public static function getCDVDet($CDVNo) {
		return DB::select('SELECT a.cdvID, a.CDVNo, a.chkDate, a.particular, b.empName,a.payee, a.address, d.bankName, a.chkNO, SUM(e.amount) AS Total
						FROM tbl_cdv a 
						LEFT JOIN tbl_useracct c ON c.userID=a.prepBy
						LEFT JOIN tbl_employee b ON b.empID=c.empID
						LEFT JOIN tbl_bank d ON d.bankID=a.bankID
						LEFT JOIN tbl_acctngentries e ON a.cdvID=e.cdvID
						WHERE e.idAcctTitleCR IS NOT NULL AND a.cdvID = ?',array($CDVNo));
	}

	public static function getDBEntries($CDVNo) {
			return DB::select('SELECT a.cdvID, b.acctTitle, e.amount, e.idAcctTitleDB
						FROM tbl_cdv a 
						LEFT JOIN tbl_acctngEntries e ON a.cdvID=e.cdvID
						LEFT JOIN tbl_acctchart b ON b.idAcctTitle = e.idAcctTitleDB 
						WHERE e.idAcctTitleDB IS NOT NULL AND a.cdvID = ?',array($CDVNo));
	}

	public static function getCREntries($CDVNo) {
			return DB::select('SELECT a.cdvID, b.acctTitle, e.amount, e.idAcctTitleCR, f.empName
						FROM tbl_cdv a 
						LEFT JOIN tbl_acctngEntries e ON a.cdvID=e.cdvID
						LEFT JOIN tbl_acctchart b ON b.idAcctTitle = e.idAcctTitleCR  
						LEFT JOIN tbl_useracct c ON c.userID=a.approveBy
						LEFT JOIN tbl_employee f ON f.empID=c.empID
						WHERE e.idAcctTitleCR IS NOT NULL AND a.cdvID = ?',array($CDVNo));
	}

	public static function getDBSum($CDVNo) {
		return DB::select('SELECT a.cdvID, SUM(e.amount) AS Total
						FROM tbl_cdv a 
						LEFT JOIN tbl_acctngentries e ON a.cdvID=e.cdvID
						WHERE e.idAcctTitleDB IS NOT NULL AND a.cdvID = ?',array($CDVNo));
	}
}		
