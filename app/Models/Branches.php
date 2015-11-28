<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Branches extends Model {

	public static function createBranch($data){
		$branch = $data['branch'];
		$userID = $data['userID'];

		$result = DB::insert('INSERT INTO tbl_branch(brName,brManager,brAddress,tel,IP,code,userID) VALUES(?,?,?,?,?,?,?)',
			array($branch['brName'],$branch['brManager'],$branch['brAddress'],$branch['tel'],$branch['IP'],$branch['code'],$userID));

		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'New Branch has been added.';
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

	public static function getBranchByID($id){
		$result = DB::select('SELECT * FROM tbl_branch WHERE brID=?',array($id));
		return $result;
	}

	public static function updateBranch($id, $data){
		$branch = $data['branch'];
		$userID = $data['userID'];

		$result = DB::table('tbl_branch')->where('brID',$id)
					->update([
						'brName'=> $branch['brName'],
						'brManager'=> $branch['brManager'],
						'brAddress'=> $branch['brAddress'],
						'tel'=> $branch['tel'],
						'IP'=> $branch['IP'],
						'code'=> $branch['code'],
						'userID'=>$userID
					]);

		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'Branch Details has been updated';
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