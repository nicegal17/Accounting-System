<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class OReceipts extends Model {

	public static function getPayer(){
		$tbl_branch = DB::table('tbl_branch')->get();

		return $tbl_branch;
	}

	public static function saveOR($data) {
		$OR = $data['OR'];
		$userID = $data['userID'];

		$result = DB::insert('INSERT INTO tbl_OR(ORNum,transDate,branch,amount,particulars,userID) VALUES (?,?,?,?,?,?)',
			[$OR['ORNum'],Carbon::NOW(),$OR['payer'],$OR['amount'],$OR['particulars'],$userID]);

		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'Offcial Receipt has been saved';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while saving the record';
		}
		return $results; 
	}
	
}