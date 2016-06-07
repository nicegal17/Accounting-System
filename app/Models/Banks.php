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
			$results['msg'] = 'New Bank has been added.';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while saving the record';
		}
		return $results;
	}

	public static function getBanks(){
		$tbl_bank = DB::table('tbl_bank')->get();

		return $tbl_bank;
	}

	public static function getBankID($id){
		$result = DB::select('SELECT * FROM tbl_bank WHERE bankID=?',array($id));

		return $result;
	}

	public static function updatebank($id,$data){
		$result = DB::table('tbl_bank')->WHERE('bankID',$id)
					->update([
						'bankName'=> $data['bankName'],
						'acctNum'=> $data['acctNum'],
						'address'=> $data['address'],
						'Tel'=> $data['Tel']
					]);
		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'Record has been updated';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while updating the record';
		}

		return $results;
	}

	public static function deleteBank($id){
		$result = DB::table('tbl_bank')->where('bankID',$id)->delete();

		return $result;
	}

}				