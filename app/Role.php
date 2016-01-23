<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
	protected $table = 'tbl_role';

	public function users() {
		return $this->hasMany('App\User', 'roleID', 'id');
	}
}
?>