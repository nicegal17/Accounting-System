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
		$tbl_acctchart = DB::table('tbl_acctchart')
							->where('depth', '=',2)
							->orderBy('idAcctTitle','asc')
							->get();

		return $tbl_acctchart;
	}

	public static function createCDV($data){
		/*$id = DB::insert('INSERT INTO tbl_cdv(payee,address,chkDate,bankID,acctID,amount,chkNO,particular)VALUES(?,?,?,?,?,?,?,?)',
				[$data['payee'],$data['address'],$data['chkDate'],$data['bank'],$data['acctID'],$data['amount'],$data['chkNo'],$data['particular']]);
*/
		$id = DB::table('tbl_cdv')->insertGetId(['payee' => ($data['payee']),'address' => ($data['address']),'chkDate' => ($data['chkDate']),
			'bankID' => ($data['bankID']),'acctID' => ($data['acctID']),'amount' => ($data['amount']),'chkNO' => ($data['chkNo']),'particular' => ($data['particular'])]);

		if($id){
			$ids['success'] = 'true';
			$ids['msg'] = 'Record Successfully Saved';
		}else{
			$ids['success'] = 'false';
			$ids['msg'] = 'WARNING: Unknown error occur while saving the record';	
		}

		return $ids;

		/*foreach ($entry as $key => $value) {
			$result = DB::insert('INSERT INTO tbl_acctngEntries(cdvID,idAcctTitleDB,idAcctTitleCR,amount) VALUES(?,?,?,?)',
				array($data['$id'],$data['acctTitle'],$data['acctTitle'],$data['DB']));
		}

		return $result;*/

		



		// $result = DB::insert('INSERT INTO tbl_cdv(payee, address, chkDate, bankID, acctID, chkNo, particular) VALUES (?,?,?,?,?,?,?)',
		// 	[$data['payee'],$data['address'],$data['chkDate'],$data['acctID'],$data['chkNo'],$data['particular']]);

		// $acctngEnntries = DB::insert('INSERT INTO tbl_cdv(payee, address, chkDate, bankID, acctID, chkNo, particular) VALUES (?,?,?,?,?,?,?)',
		// 	[$data['payee'],$data['address'],$data['chkDate'],$data['acctID'],$data['chkNo'],$data['particular']]);

		/*$cdvDet = CdvDet::create([
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
		return $cdvDet;*/

	}
}