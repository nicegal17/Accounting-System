<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class JVoucher extends Model {

	public static function getAcctTitles(){
		$tbl_acctchart = DB::table('tbl_acctchart')->get();

		return $tbl_acctchart;	

	}
}