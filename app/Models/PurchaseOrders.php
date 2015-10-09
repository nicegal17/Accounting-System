<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PurchaseOrders extends Model {

	public static function getSupplier(){
		$tbl_supplier = DB::table('tbl_supplier')->get();

		return $tbl_supplier;	
	}
}
?>