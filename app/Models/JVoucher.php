<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class JVoucher extends Model {

	public static function getAcctTitles(){
		$tbl_acctchart = DB::table('tbl_acctchart')
							->where('depth', '=',2)
							->orderBy('idAcctTitle','asc')
							->get();

		return $tbl_acctchart;	
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
	
		$id = DB::table('tbl_gj')->insertGetId(['JVNum' => $JVNo[0]->JV,'transDate' => Carbon::NOW(), 'prepBy' => $userID, 'particulars' => ($jv['particular'])]);

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

			DB::table('tbl_journalEntries')->insert(['JID' => ($id),'idAcctTitleDB' => ($ID),'idAcctTitleCR' => ($ID2),'amount' => ($amount)]);			
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