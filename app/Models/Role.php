<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
	// protected $table = 'tbl_role';

	public function users() {
		return $this->hasMany('App\User');
	}

	public function permissions() {
		return $this->belongsToMany('App\Models\Permission');
	}
}
?>