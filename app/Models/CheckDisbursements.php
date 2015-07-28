<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

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
		$tbl_acctchart = DB::table('tbl_acctchart')->get();

		return $tbl_acctchart;	
	}

	public static function createCDV(array $data){
		// $result = DB::insert('INSERT INTO tbl_cdv(payee, address, chkDate, bankID, acctID, chkNo, particular) VALUES (?,?,?,?,?,?,?)',
		// 	[$data['payee'],$data['address'],$data['chkDate'],$data['acctID'],$data['chkNo'],$data['particular']]);

		// if($result){
		// 	$results['success'] = 'true';
		// 	$results['msg'] = 'Record Successfully Saved';
		// }else{
		// 	$results['success'] = 'false';
		// 	$results['msg'] = 'WARNING: Unknown error occur while saving the record';	
		// }
		// return $results;

		// $acctngEnntries = DB::insert('INSERT INTO tbl_cdv(payee, address, chkDate, bankID, acctID, chkNo, particular) VALUES (?,?,?,?,?,?,?)',
		// 	[$data['payee'],$data['address'],$data['chkDate'],$data['acctID'],$data['chkNo'],$data['particular']]);

		$cdvDet = CdvDet::create([
			'payee' => $data['payee'],
			'address' => $data['address'],
			'chkDate' => $data['chkDate'],
			'bankID' => $data['bankID'],
			'acctID' => $data['acctID'],
			'chkNo' => $data['chkNo'],
			'particular' => $data['particular'],
		]);

		$entries = Entries::create([
			'cdvID',
			'idAcctTitleDB' => $data['idAcctTitle'],
			'idAcctTitleCR' => $data['idAcctTitle'],
			'amount' => $data['amount']
		]);

		$entries->owners()->sync([$cdvDet->cdvID]);
		return $cdvDet;

	}
}