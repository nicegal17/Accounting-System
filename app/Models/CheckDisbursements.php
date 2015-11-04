<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CheckDisbursements extends Model {

	public static function getBanks(){
		$tbl_bank = DB::table('tbl_bank')->get();

		return $tbl_bank;	
	}

	public static function getAcctTitles(){
		$tbl_acctchart = DB::table('tbl_acctchart')
							->where('depth', '=',2)
							->orderBy('idAcctTitle','asc')
							->get();

		return $tbl_acctchart;
	}

	public static function getCDVNum(){
		return DB::select('SELECT idNum, numSeries FROM tbl_series WHERE ABRV="CDV" ORDER BY idNum DESC LIMIT 1');
	}

	public static function CDVNumSeries(){
		return DB::select("SELECT 
						CASE WHEN (SELECT COUNT(*) FROM tbl_series) = 0 THEN
							CONCAT(YEAR(NOW()),DATE_FORMAT(NOW(),'%m'),'0001')
						ELSE 
							CONCAT(YEAR(NOW()),DATE_FORMAT(NOW(),'%m'),
						LEFT('0000',(LENGTH('0000') - 
						LENGTH(
								CONVERT((CONVERT(RIGHT((SELECT MAX(numSeries) AS CDV FROM tbl_series WHERE ABRV='CDV' ),LENGTH('0000')) , SIGNED) + 1), CHAR)))),
								CONVERT((CONVERT( RIGHT((SELECT MAX(numSeries) AS CDV FROM tbl_series WHERE ABRV='CDV'),LENGTH('0000')) , SIGNED) + 1) , CHAR)
								)
							END AS CDV");	
	}

	public static function createCDV($data){
		$cdv = $data['CDV'];
		$entries = json_decode($data['entries']);
		$userID = $data['userID'];
		$JVNumSeries = CheckDisbursements::CDVNumSeries();	
		$CDVNo = CheckDisbursements::getCDVNum();	
		$ID = $CDVNo[0]->idNum;
		$Voucher = $CDVNo[0]->numSeries + 1;
		
		DB::table('tbl_series')->where('idNum',$ID)->update(['numSeries' => ($Voucher)]);

		$id = DB::table('tbl_cdv')->insertGetId(['CDVNo' => $JVNumSeries[0]->CDV,'payee' => ($cdv['payee']),'address' => ($cdv['address']),'chkDate' => ($cdv['dt']),
			'bankID' => ($cdv['bank']),'amount' => ($cdv['amount']),'chkNO' => ($cdv['chkNO']),'particular' => ($cdv['particular']),
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
			$ids['msg'] = 'Record Successfully Saved';
		}else{
			$ids['success'] = 'false';
			$ids['msg'] = 'WARNING: Unknown error occur while saving the record';	
		 }

		return $ids;
	}
}