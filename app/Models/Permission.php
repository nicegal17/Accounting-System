<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

	protected $table = 'tbl_permissions';

	public function roles() {
		return $this->belongsToMany('App\Models\Role');
	}

	// public function users() {
 //    	return $this->hasMany('App\User')->withTimestamps();
	// }	
}
?>