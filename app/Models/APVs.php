<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class APVs extends Model {

	public static function getAPV(){
		return DB::select('SELECT * FROM tbl_apv');
	}

	public static function getAcctTitles(){
		return DB::select('SELECT * FROM tbl_acctchart ORDER BY idAcctTitle ASC');	
	}

	public static function getAPVNum(){
		return DB::select('SELECT idNum, numSeries FROM tbl_series WHERE ABRV="APV" ORDER BY idNum DESC LIMIT 1');
	}

	public static function APVNum(){
		return DB::select("SELECT 
    					CASE WHEN (SELECT COUNT(*) FROM tbl_series) = 0 THEN
							CONCAT(YEAR(NOW()),DATE_FORMAT(NOW(),'%m'),'0001')
						ELSE 
							CONCAT(YEAR(NOW()),DATE_FORMAT(NOW(),'%m'),'-',
        				LEFT('0000',(LENGTH('0000') - 
        				LENGTH(
								CONVERT((CONVERT(RIGHT((SELECT MAX(numSeries) AS APV FROM tbl_series WHERE ABRV='APV' ),LENGTH('0000')) , SIGNED)), CHAR)))),
                				CONVERT((CONVERT( RIGHT((SELECT MAX(numSeries) AS APV FROM tbl_series WHERE ABRV='APV'),LENGTH('0000')) , SIGNED)) , CHAR)
								)
    						END AS APV");	
	}

	public static function createAPV($data){
		$apv = $data['APV'];
		$entries = json_decode($data['entries']);
		$userID = $data['userID'];
		$APVSeries = APVs::APVNum();
		$APVNum = APVs::getAPVNum();
		$ID = $APVNum[0]->idNum;	
		$Voucher = $APVNum[0]->numSeries + 1;	

		DB::table('tbl_series')->where('idNum',$ID)->update(['numSeries' => ($Voucher)]);

		$id = DB::table('tbl_apv')->insertGetId(['APVNum' => $APVSeries[0]->APV,'transDate' => Carbon::NOW(), 'prepBy' => $userID, 'particulars' => ($apv['particulars'])]);

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

			DB::table('tbl_apventries')->insert(['apvID' => ($id),'idAcctTitleDB' => ($ID),'idAcctTitleCR' => ($ID2),'amount' => ($amount)]);			
		}

		if($id){
			$ids['success'] = 'true';
			$ids['msg'] = 'Account Payable Voucher has been Successfully Saved.';
		}else{
			$ids['success'] = 'false';
			$ids['msg'] = 'WARNING: Unknown error occur while saving new record.';	
		 }
		return $ids;
	}

	public static function getAPVDetails($id) {
		return DB::select('CALL SP_APVEntries(?)', array($id));
	}

	public static function updateAPV($id,$data) {
		$apv = $data['APV'];
		$userID = $data['userID'];

		$result = DB::table('tbl_apv')->where('apvID',$id)
					 ->update([
					 		'transDate' => Carbon::NOW(),
					 		'particulars' => $apv['particulars'],
					 		'prepBy' => $userID
					 	]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Account Payable Voucher has been updated.';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while updating APV.';
		}
		return $results;
	}

	public static function approveAPV($id,$data){
		$userID = $data['userID'];

		$result = DB::table('tbl_apv')->where('apvID', $id)->update(['tranStatus' => "APR",'approveBy' => $userID]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Account Payable Voucher has been approved.';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while approving APV.';
		}
	 return $results;
	}

	public static function cancelAPV($id,$data){
		$userID = $data['userID'];

		$result = DB::table('tbl_apv')->where('apvID', $id)->update(['tranStatus' => "CAN",'prepBy' => $userID]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Account Payable Voucher has been cancelled.';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while cancelling APV.';
		}
	 return $results;
	}

	public static function previewAPV($id) {
		return DB::select('CALL SP_APVEntries(?)', array($id));
	}

	public static function auditAPV($id,$data){
		$userID = $data['userID'];

		$result = DB::table('tbl_apv')->where('apvID', $id)->update(['tranStatus' => "AUD",'auditedBy' => $userID]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Account Payable Voucher has been audited.';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while auditing APV.';
		}
	 return $results;
	}

	// public static function getAPVEntries($dateParams, $dateparamsTO){
	// 	return DB::select('SELECT * FROM tbl_apv 
	// 				LEFT JOIN tbl_apventries ON tbl_apv.apvID=tbl_apventries.apvID
	// 				LEFT JOIN tbl_acctchart ON tbl_acctchart.idAcctTitle=tbl_apventries.idAcctTitleDB OR tbl_acctchart.idAcctTitle=tbl_apventries.idAcctTitleCR
	// 				WHERE transDate BETWEEN :dateParams AND :dateparamsTO', ['dateParams'=>$dateParams,'dateparamsTO'=>$dateparamsTO]);			
	// }

}