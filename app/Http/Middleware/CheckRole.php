<?php namespace App\Http\Middleware;

use Closure; 
use Illuminate\Contracts\Routing\Middleware;

 class CheckRole {
	public function handle($request, Closure $next) {
		$roles = $this->getRequiredRoleForRoute($request->route());

		if($request->user()->hasRole($roles) || !$roles) {
		//if($request->auth()->hasRole($roles) || !$roles) {
			return $next($request);
		}
		return response([
			'error' => [
					'code' => 'Insufficient Role',
					'description' => 'You are not authorized to access this resource.'
					]
			], 401);
	}

	private function getRequiredRoleForRoute($route) {
		$actions = $route->getAction();
		return isset($actions['roles']) ? $actions['roles'] : null;
	}
}
 ?>
