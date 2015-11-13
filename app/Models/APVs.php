<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class APVs extends Model {

	public static function getAcctTitles(){
		$tbl_acctchart = DB::table('tbl_acctchart')
							->where('depth', '=',2)
							->orderBy('idAcctTitle','asc')
							->get();

		return $tbl_acctchart;	
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
			$ids['msg'] = 'Record Successfully Saved';
		}else{
			$ids['success'] = 'false';
			$ids['msg'] = 'WARNING: Unknown error occur while saving the record';	
		 }
		return $ids;
	}

}