<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

// Filename is same sa class name dapat
class Banks extends Model {

	public static function createBank($data){
		$result = DB::insert('INSERT INTO tbl_bank(bankName,acctNum,address,Tel) VALUES(?,?,?,?)',
			array($data['bankName'],$data['acctNum'],$data['address'],$data['Tel']));

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