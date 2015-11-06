<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class AuditCDVs extends Model {

	public static function getCDVNo(){
		return DB::select('SELECT a.cdvID, a.CDVNo, a.transDate, a.particular, b.empName FROM tbl_cdv a
					LEFT JOIN tbl_useracct c ON c.userID=a.prepBy
					LEFT JOIN tbl_employee b ON b.empID=c.empID
					WHERE a.status = "APR" ORDER BY a.cdvID ASC ');
	}

	public static function getAcctEntries($CDVNo) {
		return DB::select('SELECT * FROM tbl_acctngEntries e LEFT JOIN tbl_acctchart a ON a.idAcctTitle = e.idAcctTitleDB OR a.idAcctTitle = e.idAcctTitleCR WHERE e.cdvID = ?',array($CDVNo));
	}

	public static function auditCDV($CDVNo){
		return DB::update('UPDATE tbl_cdv SET status="AUD" WHERE cdvID=?', array($CDVNo));
	}
}	