<?php namespace App;

trait UserRelationships {

	public function role() {
		return $this->belongsTo('App\Models\Role');
	}
}
?>