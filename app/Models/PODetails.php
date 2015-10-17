<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class PODetails extends Model {

	public static function getPODetails($id){
		return DB::select('SELECT a.poID, a.po_num, b.supplier, c.brName, c.brAddress, c.tel, a.PO_date, d.bankName, a.purchasing_agent, f.items, f.qty, f.unit, FORMAT(f.unit_price,2) AS unit_price, FORMAT(f.total,2) AS total, b.address, b.phone FROM tbl_po a
			LEFT JOIN tbl_supplier b ON b.supplierID=a.supplier
			LEFT JOIN tbl_branch c ON c.brID=a.branch
			LEFT JOIN tbl_bank d ON d.bankID=a.bank
			LEFT JOIN tbl_mop e ON e.id=a.mop
			LEFT JOIN tbl_po_items f ON a.poID=f.poID
			WHERE a.poID=?', array($id));
	}

	
}