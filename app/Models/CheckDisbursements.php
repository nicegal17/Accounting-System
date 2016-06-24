<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CheckDisbursements extends Model {

	public static function getCDV(){
		return DB::select('SELECT a.cdvID, a.CDVNo, a.payee, a.chkNo, FORMAT(a.amount,2) AS amount, a.transDate, a.status FROM tbl_cdv a ORDER BY a.cdvID ASC');
	}

	public static function getBanks(){
		return DB::select('SELECT bankID, bankName, acctNum FROM tbl_bank');
	}

	public static function getAcctTitles(){
		$tbl_acctchart = DB::table('tbl_acctchart')
							->orderBy('idAcctTitle','asc')
							->get();

		return $tbl_acctchart;
	}

	public static function getCDVByID($id){
		return DB::select('SELECT a.cdvID, a.CDVNo, a.payee, a.chkNO, FORMAT(a.amount,2) AS amount, a.particular, b.empName FROM tbl_cdv a
					LEFT JOIN tbl_useracct c ON c.userID=a.prepBy
					LEFT JOIN tbl_employee b ON b.empID=c.empID
					WHERE a.cdvID=?', array($id));
	}

	public static function getCDVDetails($id){
		return DB::select('SELECT a.cdvID, a.CDVNo, a.payee, a.address, a.chkDate, b.bankID, b.bankName, b.acctNum, FORMAT(a.amount,2) AS amount, a.chkNO, a.particular FROM tbl_cdv a
					LEFT JOIN tbl_bank b ON b.bankID=a.bankID WHERE a.cdvID=?', array($id));
	}

	public static function getCDVEntries($CDVNo) {
		return DB::select('CALL SP_CDVEntries(?)', array($CDVNo));
	}

	public static function getCDVNum(){
		return DB::select('SELECT idNum, numSeries FROM tbl_series WHERE ABRV="CDV" ORDER BY idNum DESC LIMIT 1');
	}

	// public function editCDVEntries($ID) {
	// 	// $str_arr = explode("-", $ID);
	// 	// return DB::select('SELECT a.idAcctTitle, a.acctTitle, b.amount FROM tbl_acctchart a
	// 	// 			LEFT JOIN tbl_acctngentries b ON a.idAcctTitle=b.idAcctTitleDB OR a.idAcctTitle=b.idAcctTitleCR
	// 	// 			WHERE :a.idAcctTitle AND :a.cdvID', ['a.idAcctTitle'=>$str_arr[0], 'a.cdvID'=>$str_arr[1]]);

	// 	return DB::select('SELECT a.idAcctTitle, a.acctTitle, b.amount FROM tbl_acctchart a
	// 				LEFT JOIN tbl_acctngentries b ON a.idAcctTitle=b.idAcctTitleDB OR a.idAcctTitle=b.idAcctTitleCR
	// 				WHERE a.idAcctTitle=?',array($ID));
	// }

	public static function CDVNumSeries(){
		return DB::select("SELECT 
						CASE WHEN (SELECT COUNT(*) FROM tbl_series) = 0 THEN
							CONCAT(YEAR(NOW()),DATE_FORMAT(NOW(),'%m'),'0001')
						ELSE 
							CONCAT(YEAR(NOW()),DATE_FORMAT(NOW(),'%m'),'-',
						LEFT('0000',(LENGTH('0000') - 
						LENGTH(
								CONVERT((CONVERT(RIGHT((SELECT MAX(numSeries) AS CDV FROM tbl_series WHERE ABRV='CDV' ),LENGTH('0000')) , SIGNED)), CHAR)))),
								CONVERT((CONVERT( RIGHT((SELECT MAX(numSeries) AS CDV FROM tbl_series WHERE ABRV='CDV'),LENGTH('0000')) , SIGNED)) , CHAR)
								)
							END AS CDV");	
	}

	public static function createCDV($data){
		$CDV = $data['CDV'];
		$entries = json_decode($data['entries']);
		$userID = $data['userID'];
		$CDVNumSeries = CheckDisbursements::CDVNumSeries();	
		$CDVNo = CheckDisbursements::getCDVNum();	
		$ID = $CDVNo[0]->idNum;
		$Voucher = $CDVNo[0]->numSeries + 1;
		
		DB::table('tbl_series')->where('idNum',$ID)->update(['numSeries' => ($Voucher)]);

		$id = DB::table('tbl_cdv')->insertGetId(['CDVNo' => $CDVNumSeries[0]->CDV,'payee' => ($CDV['payee']),'address' => ($CDV['address']),'chkDate' => ($CDV['dt']),
			'bankID' => ($CDV['bank']),'amount' => ($CDV['amount']),'chkNO' => ($CDV['chkNO']),'particular' => ($CDV['particular']),
			'transDate' => Carbon::NOW(), 'prepBy' => $userID ]);

		for ($i=0; $i < count($entries); $i++) { 
			$var = $entries[$i];

			$amount = (isset($var->DB) && ($var->DB > 0)) ? $var->DB : $var->CR;

			if(isset($var->DB) && !empty($var->DB)){
				$ID = $var->acctTitle;
			}else{
				$ID = null;
			}

			if (isset($var->CR) && !empty($var->CR)) {
				$ID2 = $var->acctTitle;
			}else{
				$ID2 = null;
			}

			DB::table('tbl_acctngentries')->insert(['cdvID' => ($id),'idAcctTitleDB' => ($ID),'idAcctTitleCR' => ($ID2),'amount' => ($amount)]);			
		}

		if($id){
			$ids['success'] = 'true';
			$ids['msg'] = 'New CDV has been saved';
		}else{
			$ids['success'] = 'false';
			$ids['msg'] = 'WARNING: Unknown error occur while creatting CDV';	
		 }

		return $ids;
	}

	public static function updateCDV($id,$data) {
		$CDV = $data['CDV'];
		$userID = $data['userID'];

		$result = DB::table('tbl_cdv')->where('cdvID',$id)
					 ->update([
					 		'payee' => $CDV['payee'],
					 		'address' => $CDV['address'],
					 		'chkDate' => $CDV['dt'],
					 		'bankID' => $CDV['bank'],
					 		'amount' => $CDV['amount'],
					 		'chkNO' => $CDV['chkNO'],
					 		'particular' => $CDV['particular'],
					 		'transDate' => Carbon::NOW(),
					 		'prepBy' => $userID
					 	]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Check Disbursement Voucher has been updated.';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while updating CDV.';
		}
		return $results;
	}

	public static function getCDVInfo($dateParams, $dateparamsTO){
		return DB::select('SELECT * FROM tbl_cdv 
					LEFT JOIN tbl_acctngentries ON tbl_cdv.cdvID=tbl_acctngentries.cdvID
					LEFT JOIN tbl_acctchart ON tbl_acctchart.idAcctTitle=tbl_acctngEntries.idAcctTitleDB OR tbl_acctchart.idAcctTitle=tbl_acctngEntries.idAcctTitleCR
					WHERE chkDate BETWEEN :dateParams AND :dateparamsTO', ['dateParams'=>$dateParams,'dateparamsTO'=>$dateparamsTO]);			
	}

	public static function previewCDV($id){
		return DB::select('CALL SP_CDVPreview(?)', array($id));
	}

	public static function approveCDV($CDVNo,$data){
		$userID = $data['userID'];

		$result = DB::table('tbl_cdv')->where('cdvID', $CDVNo)->update(['status' => "APR",'approveBy' => $userID]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Check Disbursement Voucher has been approved.';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while approving CDV.';
		}
	 return $results;
	}

	public static function cancelCDV($CDVNo, $data) {
		$userID = $data['userID'];

		$result = DB::table('tbl_cdv')->where('cdvID', $CDVNo)->update(['status' => "CAN",'prepBy' => $userID]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Check Disbursement Voucher has been cancelled.';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unable to cancel CDV.';
		}
	 return $results;
	}

	public static function auditCDV($CDVNo, $data) {
		$userID = $data['userID'];

		$result = DB::table('tbl_cdv')->where('cdvID', $CDVNo)->update(['status' => "AUD",'auditedBy' => $userID]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Check Disbursement Voucher has been audited.';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unable to audit CDV.';
		}
	 return $results;
	}
}	