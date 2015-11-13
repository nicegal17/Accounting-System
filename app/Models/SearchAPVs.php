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

	public static function getAcctEntries($apvID) {
		return DB::select('SELECT * FROM tbl_apventries e LEFT JOIN tbl_acctchart a ON a.idAcctTitle = e.idAcctTitleDB OR a.idAcctTitle = e.idAcctTitleCR WHERE e.apvID = ?',array($apvID));
	}
}	