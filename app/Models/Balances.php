<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Balances extends Model {

	public static function getAcctTitles(){
		$tbl_acctchart = DB::table('tbl_acctchart')
							->where('depth', '=',2)
							->get();

		return $tbl_acctchart;
	}

	public static function createBeginBal($data){
		
		$result = DB::insert('INSERT INTO tbl_gl(idAcctTitle,transDate,amount,periodID,bookID,normsID) VALUES(?,NOW(),?,1,5,?)',
			array($data['acctTitle'],$data['amount'],$data['normsID']));

		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'Beginning Balance Successfully Saved';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while saving the record';
		}
		return $results;
	}
}				