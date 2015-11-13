<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class AuditAPVs extends Model {

	public static function getAPV(){
		return DB::select('SELECT a.apvID, a.APVNum, a.transDate, a.particulars, b.empName FROM tbl_apv a
					LEFT JOIN tbl_useracct c ON c.userID=a.prepBy
					LEFT JOIN tbl_employee b ON b.empID=c.empID
					WHERE a.tranStatus = "APR" ORDER BY a.apvID ASC ');
	}

	public static function getAcctEntries($apvID) {
		return DB::select('SELECT * FROM tbl_apventries e LEFT JOIN tbl_acctchart a ON a.idAcctTitle = e.idAcctTitleDB OR a.idAcctTitle = e.idAcctTitleCR WHERE e.apvID = ?',array($apvID));
	}

	public static function auditAPV($apvID,$data){
		$userID = $data['userID'];

		$result = DB::table('tbl_apv')->where('apvID', $apvID)
					->update([
						'tranStatus' => "AUD",
						'auditedBy' => $userID
					]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Account Payable Voucher has been audited';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while updating the record';
		}
	 return $results;
	}
}	