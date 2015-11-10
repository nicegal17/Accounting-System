<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class AppCDVs extends Model {

	public static function getCDVNo(){
		return DB::select('SELECT a.cdvID, a.CDVNo, a.transDate, a.particular, b.empName FROM tbl_cdv a
					LEFT JOIN tbl_useracct c ON c.userID=a.prepBy
					LEFT JOIN tbl_employee b ON b.empID=c.empID
					WHERE status = "PEN" ORDER BY a.cdvID ASC ');
	}

	public static function getAcctEntries($CDVNo) {
		return DB::select('SELECT * FROM tbl_acctngEntries e LEFT JOIN tbl_acctchart a ON a.idAcctTitle = e.idAcctTitleDB OR a.idAcctTitle = e.idAcctTitleCR WHERE e.cdvID = ?',array($CDVNo));
	}

	public static function appCDV($CDVNo,$data){
		$userID = $data['userID'];

		$result = DB::table('tbl_cdv')->where('cdvID', $CDVNo)
					->update([
						'status' => "APR",
						'approveBy' => $userID
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

	public static function denyCDV($CDVNo){
		return DB::update('UPDATE tbl_cdv SET status="DNY" WHERE cdvID=?', array($CDVNo));
	}
}	