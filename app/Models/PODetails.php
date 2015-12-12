<?php 

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class PODetails extends Model {

	public static function getPODetails($id){
		return DB::select('SELECT a.poID, a.po_num, b.supplier, c.brName, c.brAddress, c.tel, a.PO_date, d.bankName, a.purchasing_agent, b.address, 
			b.phone, d.acctNum, f.value, g.empName FROM tbl_po a
			LEFT JOIN tbl_supplier b ON b.supplierID=a.supplier
			LEFT JOIN tbl_branch c ON c.brID=a.requestedby
			LEFT JOIN tbl_bank d ON d.bankID=a.bank
			LEFT JOIN tbl_mop e ON e.id=a.mop
			LEFT JOIN tbl_settings f ON f.idSettings=a.branch
			LEFT JOIN tbl_useracct h ON h.userID=a.userID
			LEFT JOIN tbl_employee g ON g.empID=h.empID
			WHERE a.poID=?', array($id));
	}

	public static function getApprovingOfficer($id) {
		return DB::select('SELECT a.empName, g.poID
			FROM tbl_po g
			LEFT JOIN tbl_useracct h ON h.userID=g.approveBy
			LEFT JOIN tbl_employee a ON a.empID=h.empID
			WHERE g.poID=?', array($id));
	}

	public static function getPOItems($id){
		return DB::select('SELECT a.poID, f.items, f.qty, f.unit, FORMAT(f.unit_price,2) AS unit_price, FORMAT(f.total,2) AS total
			FROM tbl_po a
			LEFT JOIN tbl_po_items f ON a.poID=f.poID
			WHERE a.poID=?', array($id));
	}

	public static function selectSUM($id){
		return DB::select('SELECT FORMAT(SUM(total),2) AS totalAmt FROM tbl_po_items WHERE poID=?', array($id));
	}

	public static function approvePO($id,$data){
		$userID = $data['userID'];

		$result = DB::table('tbl_po')->where('poID', $id)
					->update([
						'status' => "APR",
						'approveBy' => $userID
					]);

		if($result){	
			$results['success'] = 'true';
			$results['msg'] = 'Purchase Order has been approved';	
		}else{
			$results['success'] = 'false';
			$results['msg'] = 'WARNING: Unknown error occur while updating the record';
		}
	 return $results;
	}
	
}