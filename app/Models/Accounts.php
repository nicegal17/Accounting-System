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

	// public static function getAccountTitles(){
	// 	$tbl_acctchart = DB::table('tbl_acctchart')->get();

	// 	return $tbl_acctchart;
	// }

	public static function createAccount($data){
		$result = DB::insert('INSERT INTO tbl_acctchart(acctCode,acctTitle,acctTypeID,normsID,FSID,fundID) VALUES(?,?,?,?,?,?)',
			array($data['acctCode'],$data['acctTitle'],$data['acctType'],$data['norm'],$data['statement'],$data['fund']));

		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'Record Successfully Saved';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while saving the record';
		}
		return $results;
	}

	public static function getAccountChart(){
		$tbl_acctchart = DB::table('tbl_acctchart')
						->leftjoin('tbl_normalBalance', 'tbl_acctchart.normsID', '=', 'tbl_acctchart.normsID')
						->leftjoin('tbl_acctGroup', 'tbl_acctchart.acctTypeID', '=', 'tbl_acctchart.acctTypeID')
						->get();

		return $tbl_acctchart;
	}
}				