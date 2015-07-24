<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

// Filename is same sa class name dapat
class Branches extends Model {

	public static function createBranch($data){
		$result = DB::insert('INSERT INTO tbl_branch(brName,brManager,brAddress,tel,IP,code) VALUES(?,?,?,?,?,?)',
			array($data['brName'],$data['brManager'],$data['brAddress'],$data['tel'],$data['IP'],$data['code']));

		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'Record Successfully Saved';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while saving the record';
		}
		return $results;
	}

	public static function getBranches(){
		$tbl_branch = DB::table('tbl_branch')->orderBy('brName','asc')->get();

		return $tbl_branch;
	}

	public static function getBranchID($id){
		$result = DB::select('SELECT * FROM tbl_branch WHERE brID=?',array($id));
		return $result;
	}

	public static function updateBranch($id, $data){
		$result = DB::table('tbl_branch')->where('brID',$id)
					->update([
						'brName'=> $data['brName'],
						'brManager'=> $data['brManager'],
						'brAddress'=> $data['brAddress'],
						'tel'=> $data['tel'],
						'IP'=> $data['IP'],
						'code'=> $data['code']
					]);

		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'Record Successfully Updated';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while updating the record';
		}
		return $results;
	}

	public static function deleteBranch($id){
		$result = DB::table('tbl_branch')->where('brID',$id)->delete();

		return $result;
	}

	public static function searchBranch($data){
		$result = DB::select('SELECT * FROM tbl_branch WHERE brName like?',$data);

		return $result;
	}
}				