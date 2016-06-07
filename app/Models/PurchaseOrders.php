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

	public static function getBranch(){
		$tbl_settings = DB::table('tbl_settings')->where('idSettings', '1')
						->get();

		return $tbl_settings;	
	}

	public static function getBank(){
		$tbl_bank = DB::table('tbl_bank')->get();

		return $tbl_bank;	
	}

	public static function getBranchNames(){
		$tbl_branch = DB::table('tbl_branch')->where('code', '<>', 'SMSi')
						->get();

		return $tbl_branch;	
	}

	public static function getSupplier2(){
		$tbl_supplier = DB::table('tbl_supplier')->get();

		return $tbl_supplier;	
	}

	public static function getUnit(){
		$tbl_unit = DB::table('tbl_unit')->get();

		return $tbl_unit;		
	}

	public static function getMOP(){
		$tbl_mop = DB::table('tbl_mop')->get();

		return $tbl_mop;		
	}

	public static function getPONum(){
		return DB::select('SELECT idNum, numSeries FROM tbl_series WHERE ABRV="PO" ORDER BY idNum DESC LIMIT 1');
	}

	public static function PONumseries(){
		return DB::select("SELECT 
    					CASE WHEN (SELECT COUNT(*) FROM tbl_series) = 0 THEN
							CONCAT(YEAR(NOW()),'001')
						ELSE 
							CONCAT(YEAR(NOW()),
        				LEFT('0000',(LENGTH('000') - 
        				LENGTH(
								CONVERT((CONVERT(RIGHT((SELECT MAX(numSeries) AS PO FROM tbl_series WHERE ABRV='PO' ),LENGTH('00')) , SIGNED)), CHAR)))),
                				CONVERT((CONVERT( RIGHT((SELECT MAX(numSeries) AS PO FROM tbl_series WHERE ABRV='PO'),LENGTH('00')) , SIGNED)) , CHAR)
								)
    						END AS PO");	
	}

	public static function createPO($data){
		$po = $data['PO'];
		$userID = $data['userID'];
		$entries = json_decode($data['entries']);
		$POSeries = PurchaseOrders::PONumseries();	
		$PONo = PurchaseOrders::getPONum();	

		$ID = $PONo[0]->idNum;
		$Voucher = $PONo[0]->numSeries + 1;

		DB::table('tbl_series')->where('idNum',$ID)->update(['numSeries' => ($Voucher)]);

		$result = DB::table('tbl_po')->insertGetId(['po_num' => $POSeries[0]->PO, 'supplier' => ($po['supplier']), 'branch' => ($po['branch']),
				'PO_date' => Carbon::NOW(), 'bank' => ($po['bank']), 'purchasing_agent' => ($po['POAgent']), 'requestedby' =>($po['brName']),
				 'mop' =>($po['mop']), 'userID' => $userID ]);

		for ($i=0; $i < count($entries); $i++) { 
			$var = $entries[$i];

			$quantity = $var->qty;
			$unit = $var->unit;
			$Items = $var->Items;
			$unitPrice = $var->unitPrice;
			$total = $var->total;
			
			DB::table('tbl_po_items')->insert(['poID' => ($result),'items' => ($Items),'qty' => ($quantity),'unit' => ($unit),'unit_price' =>($unitPrice),'total' => ($total)]);	
		}

		if($result){
			$results['success'] = 'true';
			$results['msg'] = 'New Purchase Order has been saved.';
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while saving the record';	
		 }

		return $results;
	}

	public static function getPOLists(){
		return DB::select('SELECT a.poID, a.po_num, b.supplier, c.brName, a.PO_date, a.purchasing_agent, f.value AS branch, e.payment 
				, a.status FROM tbl_po a
				LEFT JOIN tbl_supplier b ON b.supplierID=a.supplier
				LEFT JOIN tbl_branch c ON c.brID=a.branch
				LEFT JOIN tbl_bank d ON d.bankID=a.bank
				LEFT JOIN tbl_mop e ON e.id=a.mop
				LEFT JOIN tbl_settings f On f.idsettings=a.branch ORDER BY a.po_num ASC');
	}
}
?>