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

	public static function getAccountNo(){
		$tbl_bankAcct = DB::table('tbl_bankAcct')->get();

		return $tbl_bankAcct;	
	}

	public static function getAcctTitles(){
		$tbl_acctchart = DB::table('tbl_acctchart')
							->where('depth', '=',2)
							->orderBy('idAcctTitle','asc')
							->get();

		return $tbl_acctchart;
	}

	public static function createCDV($data){
		$cdv = $data['CDV'];
		$entries = json_decode($data['entries']);

		$id = DB::table('tbl_cdv')->insertGetId(['payee' => ($cdv['payee']),'address' => ($cdv['address']),'chkDate' => ($cdv['dt']),
			'bankID' => ($cdv['bank']),'acctID' => ($cdv['account']),'amount' => ($cdv['amount']),'chkNO' => ($cdv['chkNO']),'particular' => ($cdv['particular']),
			'transDate' => Carbon::NOW() ]);

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