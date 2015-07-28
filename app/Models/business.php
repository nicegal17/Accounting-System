<?php
	public function owners(){
		return $this->belongsToMany('App\User', 'userbusinesses');
	}
?>