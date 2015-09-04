<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

// Filename is same sa class name dapat
class SubAccounts extends Model {

	public static function getAccountTitles(){
		$tbl_acctchart = DB::table('tbl_acctchart')
							->where('depth', '=',2)
							->get();

		return $tbl_acctchart;
	}

	public static function getNorms(){
		$tbl_normalBalance = DB::table('tbl_normalBalance')->get();

		return $tbl_normalBalance;
	}

	public static function getAcctTypes(){
		$tbl_acctGroup = DB::table('tbl_acctGroup')->get();

		return $tbl_acctGroup;
	}

	public static function getFunds(){
		$tbl_fund = DB::table('tbl_fund')->get();

		return $tbl_fund;
	}

	public static function getFinStatements(){
		$tbl_fs = DB::table('tbl_fs')->get();

		return $tbl_fs;
	}

	public static function createSubAccount($data){
		$result = DB::insert('INSERT INTO tbl_acctchart(acctCode,acctTitle,idParent,acctTypeID,normsID,FSID,fundID) VALUES(?,?,?,?,?,?,?)',
			array($data['acctCode'],$data['accountTitle'],$data['acctTitle'],$data['acctType'],$data['norm'],$data['statement'],$data['fund']));

		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'Record Successfully Saved';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while saving the record';
		}
		return $results;
	}
}				