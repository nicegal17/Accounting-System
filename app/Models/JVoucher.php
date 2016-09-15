<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class JVoucher extends Model {

	public static function getAcctTitles(){
		return DB::select('SELECT * FROM tbl_acctchart ORDER BY idAcctTitle ASC');
	}

	public static function getJVNum(){
		return DB::select('SELECT idNum, numSeries FROM tbl_series WHERE ABRV="JV" ORDER BY idNum DESC LIMIT 1');
	}

	public static function JVnum(){
		return DB::select("SELECT 
    					CASE WHEN (SELECT COUNT(*) FROM tbl_series) = 0 THEN
							CONCAT(YEAR(NOW()),DATE_FORMAT(NOW(),'%m'),'0001')
						ELSE 
							CONCAT(YEAR(NOW()),DATE_FORMAT(NOW(),'%m'),'-',
        				LEFT('0000',(LENGTH('0000') - 
        				LENGTH(
								CONVERT((CONVERT(RIGHT((SELECT MAX(numSeries) AS JV FROM tbl_series WHERE ABRV='JV' ),LENGTH('0000')) , SIGNED)), CHAR)))),
                				CONVERT((CONVERT( RIGHT((SELECT MAX(numSeries) AS JV FROM tbl_series WHERE ABRV='JV'),LENGTH('0000')) , SIGNED)) , CHAR)
								)
    						END AS JV");	
	}

	public static function createJV($data){
		$jv = $data['JV'];
		$entries = json_decode($data['entries']);
		$userID = $data['userID'];
		$JVNo = JVoucher::JVnum();	
		$JVNumSeries = JVoucher::getJVNum();	
		$ID = $JVNumSeries[0]->idNum;
		$Voucher = $JVNumSeries[0]->numSeries + 1;

		DB::table('tbl_series')->where('idNum',$ID)->update(['numSeries' => ($Voucher)]);
	
		$id = DB::table('tbl_gj')->insertGetId(['JVNum' => $JVNo[0]->JV,'transDate' => Carbon::NOW(), 'prepBy' => $userID, 'particulars' => ($jv['particulars'])]);

		for ($i=0; $i < count($entries); $i++) { 
			$var = $entries[$i];

			$amount = (isset($var->DB) && ($var->DB > 0)) ? $var->DB : $var->CR;

			if(isset($var->DB) && !empty($var->DB)){
				$ID = $var->title;
			}else{
				$ID = null;
			}

			if (isset($var->CR) && !empty($var->CR)) {
				$ID2 = $var->title;
			}else{
				$ID2 = null;
			}

			DB::table('tbl_journalEntries')->insert(['JID' => ($id),'idAcctTitleDB' => ($ID),'idAcctTitleCR' => ($ID2),'amount' => ($amount)]);			
		}

		if($id){
			$ids['success'] = 'true';
			$ids['msg'] = 'New Journal Voucher Entry has been saved.';
		}else{
			$ids['success'] = 'false';
			$ids['msg'] = 'WARNING: Unknown error occur while saving the record';	
		 }
		return $ids; 
	}

	public static function getJVPK($id){
		return DB::select('SELECT a.PK, a.JID, b.idAcctTitle, b.acctTitle, a.amount FROM tbl_journalentries a LEFT JOIN tbl_acctchart b ON b.idAcctTitle=a.idAcctTitleDB OR b.idAcctTitle=a.idAcctTitleCR
					WHERE a.PK=?', array($id));
	}

	public static function updateJVEntries($id,$data){	
	$entries = json_decode($data['entries']);

		// $result = DB::table('tbl_journalentries')->where('PK', $id)
		// 			->update([
		// 				'idAcctTitleDB' => $data['IDTest'],
		// 				'amount' => $data['amount']
		// 			]);
				
		// return DB::table('tbl_gj')->where('JID', $id)->update(['particulars' => ($jv['particulars'])]);

		for ($i=0; $i < count($entry); $i++) { 
			$var = $entry[$i];

			$amount = (isset($var->DB) && ($var->DB > 0)) ? $var->DB : $var->CR;

			if(isset($var->DB) && !empty($var->DB)){
				$ID = $var->title;
			}else{
				$ID = null;
			}

			if (isset($var->CR) && !empty($var->CR)) {
				$ID2 = $var->title;
			}else{
				$ID2 = null;
			}

			$result= DB::table('tbl_journalEntries')->where('JID', $id)->update(['idAcctTitleDB' => ($ID),'idAcctTitleCR' => ($ID2),'amount' => ($amount)]);			
		}

		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'New Journal Voucher Entry has been saved.';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while saving the record';	
		 }
		return $results; 
	}

	public static function getJVs() {
		return DB::select('SELECT * FROM tbl_gj ORDER BY JID ASC');
	}

	public static function getJVDetails($id){
		return DB::select('CALL SP_JVEntries(?)', array($id));
	}

	public static function approveJV($id,$data){
		$userID = $data['userID'];

		$result = DB::table('tbl_gj')->where('JID', $id)->update(['status' => "APR",'approveBy' => $userID]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Journal Voucher has been approved.';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while approving JV.';
		}
	 return $results;
	}

	public static function cancelJV($id,$data){
		$userID = $data['userID'];

		$result = DB::table('tbl_gj')->where('JID', $id)->update(['status' => "CAN",'prepBy' => $userID]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Journal Voucher has been cancelled.';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while cancelling JV.';
		}
	 return $results;
	}

	public static function auditJV($id,$data){
		$userID = $data['userID'];

		$result = DB::table('tbl_gj')->where('JID', $id)->update(['status' => "AUD",'auditedBy' => $userID]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Journal Voucher has been audited.';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while auditing JV.';
		}
	 return $results;
	}

	public static function previewJV($id) {
		return DB::select('CALL SP_JVEntries(?)', array($id));
	}


	public static function getGJEntries($dateParams, $dateparamsTO){
		return DB::select('SELECT * FROM tbl_gj 
					LEFT JOIN tbl_journalEntries ON tbl_gj.JID=tbl_journalEntries.JID
					LEFT JOIN tbl_acctchart ON tbl_acctchart.idAcctTitle=tbl_journalEntries.idAcctTitleDB OR tbl_acctchart.idAcctTitle=tbl_journalEntries.idAcctTitleCR
					WHERE transDate BETWEEN :dateParams AND :dateparamsTO', ['dateParams'=>$dateParams,'dateparamsTO'=>$dateparamsTO]);			
	}
}