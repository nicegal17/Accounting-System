<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class AuditJVs extends Model {

	public static function getJVNo(){
		return DB::select('SELECT a.JID, a.JVNum, a.transDate, a.particulars, b.empName FROM tbl_gj a
					LEFT JOIN tbl_useracct c ON c.userID=a.prepBy
					LEFT JOIN tbl_employee b ON b.empID=c.empID
					WHERE a.status = "APR" ORDER BY a.JID ASC ');
	}

	public static function getAcctEntries($JVNum) {
		return DB::select('SELECT * FROM tbl_journalentries e LEFT JOIN tbl_acctchart a ON a.idAcctTitle = e.idAcctTitleDB OR a.idAcctTitle = e.idAcctTitleCR WHERE e.JID = ?',array($JVNum));
	}

	public static function auditJV($JVNum,$data){
		$userID = $data['userID'];

		$result = DB::table('tbl_gj')->where('JID', $JVNum)
					->update([
						'status' => "AUD",
						'auditedBy' => $userID
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
}	