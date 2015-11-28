<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Assets extends Model {

	public static function getCategories(){
		$tbl_category = DB::table('tbl_category')->get();

		return $tbl_category;
	}

	public static function getPeriods(){
		$tbl_acctperiod = DB::table('tbl_acctperiod')->get();

		return $tbl_acctperiod;
	}

	public static function getAssets() {
		return DB::select('SELECT a.itemID, a.itemName, FORMAT(a.cost,2) AS cost, a.datePurchased, a.qty, b.categoryID, b.desc FROM tbl_assetinfo a
					LEFT JOIN tbl_category b ON b.categoryID=a.categoryID');
	}

	public static function createAsset($data){
		$Asset = $data['asset'];
		$userID = $data['userID'];
		
		$result = DB::insert('INSERT INTO tbl_assetinfo(itemName,cost,datePurchased,estLife,qty,categoryID,postedDate,postedBy) VALUES(?,?,?,?,?,?,?,?)',
			[$Asset['itemName'],$Asset['cost'],$Asset['dt'],$Asset['estLife'],$Asset['qty'],$Asset['category'],Carbon::NOW(),$userID]);

		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'New Asset Item has been added successfully.';
		}else{	
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while saving the record';
		}
		return $results;
	}

	public static function getAssetItem($id){
		return DB::select('SELECT a.itemID, a.itemName, a.cost, a.datePurchased, a.estLife, a.qty, b.desc, b.categoryID FROM tbl_assetinfo a LEFT JOIN tbl_category b ON b.categoryID=a.categoryID WHERE a.itemID=?', array($id));
	}

	public static function updateFA($id,$data) {
		$Asset = $data['asset'];
		$userID = $data['userID'];

		$result = DB::table('tbl_assetinfo')->where('itemID', $id)
					->update([
						'itemName' => $Asset['itemName'],
						'cost' => $Asset['cost'],
						'datePurchased' => $Asset['dt'],
						'estLife' => $Asset['estLife'],
						'qty' => $Asset['qty'],
						'categoryID' => $Asset['category'],
						'postedBy' => $userID
					]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Fixed Asset Item has been updated';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while updating the record';
		}
		return $results;
	} 
}				