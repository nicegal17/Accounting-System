<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class AppJVouchers extends Model {

	public static function getJVNo(){
		return DB::select('SELECT a.JID, a.JVNum, a.transDate, a.particulars, b.empName FROM tbl_gj a
					LEFT JOIN tbl_useracct c ON c.userID=a.prepBy
					LEFT JOIN tbl_employee b ON b.empID=c.empID
					WHERE status = "PEN" ORDER BY a.JID ASC ');
	}

	public static function getAcctEntries($JID) { 	
		return DB::select('SELECT * FROM tbl_journalEntries e LEFT JOIN tbl_acctchart a ON a.idAcctTitle = e.idAcctTitleDB OR a.idAcctTitle = e.idAcctTitleCR WHERE e.JID=?',array($JID));
	}

	public static function approveJV($JID,$data){
		$userID = $data['userID'];
		// return DB::update('UPDATE tbl_gj SET status="APR", approveby=$ WHERE JID=?', array($JID));

		$result = DB::table('tbl_gj')->where('JID', $JID)
					->update([
						'status' => "APR",
						'approveby' => $userID
					]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Record Successfully Updated';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while updating the record';
		}
		return $results;
	}

	public static function denyJV($JID){
		return DB::update('UPDATE tbl_gj SET status="DNY" WHERE JID=?', array($JID));
	}
}	