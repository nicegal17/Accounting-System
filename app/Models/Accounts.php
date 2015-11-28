<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model {

	public static function getFunds(){
		$tbl_fund = DB::table('tbl_fund')->get();

		return $tbl_fund;
	}

	public static function getAcctTypes(){
		$tbl_acctGroup = DB::table('tbl_acctGroup')->get();

		return $tbl_acctGroup;
	}

	public static function getNorms(){
		$tbl_normalBalance = DB::table('tbl_normalBalance')->get();

		return $tbl_normalBalance;
	}

	public static function getFS(){
		$tbl_FS = DB::table('tbl_FS')->get();

		return $tbl_FS;
	}

	public static function createAccount($data){
		$account = $data['account'];
		$userID = $data['userID'];

		$id = DB::table('tbl_acctchart')->insert(['acctCode' => $account['acctCode'], 'acctTitle' => $account['acctTitle'], 'acctTypeID' => $account['acctType'],
				'normsID' => $account['normDesc'], 'FSID' => $account['FSDesc'], 'fundID' => $account['fundDesc'], 'postedBy' => $userID]);

		if($id){
			$ids['success'] = 'true';
			$ids['msg'] = 'New Account Title has been added.';
		}else{
			$ids['success'] = 'false';
			$ids['msg'] = 'WARNING: Unknown error occur while saving the record';
		}
		return $ids;
	}

	public static function getAccountChart(){
		return DB::select('SELECT a.idAcctTitle, a.acctCode, a.acctTitle, a.idParent, b.acctType, c.normDesc, d.fundDesc, e.FSDesc
				FROM tbl_acctchart a 
				LEFT JOIN tbl_acctGroup b ON b.acctTypeID=a.acctTypeID
				LEFT JOIN tbl_normalBalance c ON c.normsID=a.normsID
				LEFT JOIN tbl_fund d ON d.fundID=a.fundID
				LEFT JOIN tbl_fs e ON e.FSID=a.FSID
				WHERE a.depth = 1
				ORDER BY a.acctTitle ASC');
	}

	public static function getAcctChartByID($id) {
		return DB::select('SELECT a.idAcctTitle, a.acctCode, a.acctTitle, a.idParent, b.acctTypeID, b.acctType, c.normsID, c.normDesc, d.fundID, d.fundDesc, e.FSID, e.FSDesc
				FROM tbl_acctchart a 
				LEFT JOIN tbl_acctGroup b ON b.acctTypeID=a.acctTypeID
				LEFT JOIN tbl_normalBalance c ON c.normsID=a.normsID
				LEFT JOIN tbl_fund d ON d.fundID=a.fundID
				LEFT JOIN tbl_fs e ON e.FSID=a.FSID
				WHERE a.depth = 1 AND a.idAcctTitle=?', array($id));
	}

	public static function updateAccount($id,$data){
		$account = $data['account'];
		$userID = $data['userID'];

		$result = DB::table('tbl_acctchart')->where('idAcctTitle', $id)
					->update([
						'acctCode' => $account['acctCode'],
						'acctTitle' => $account['acctTitle'],
						'acctTypeID' => $account['acctType'],
						'normsID' => $account['normDesc'],
						'FSID' => $account['FSDesc'],
						'postedBy' => $userID,
						'fundID' => $account['fundDesc'],
					]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Account Title has been updated.';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while updating the record';
		}
	 return $results;
	}
}				