<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class SOAs extends Model {

	public static function getInfo($id){
		return DB::select('SELECT a.brName, a.brAddress FROM tbl_branch a LEFT JOIN tbl_po b ON a.brID=b.branch WHERE b.paymentStatus='U'');
	}
}