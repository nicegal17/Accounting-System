<?php namespace App\Http\Middleware;

use Closure; 
use Illuminate\Contracts\Routing\Middleware;

 class CheckRole implements Middleware {
	// public function handle($request, Closure $next) {
	// 	$roles = $this->getRequiredRoleForRoute($request->route());

	// 	if($request->user()->hasRole($roles) || !$roles) {
	// 	//if($request->auth()->hasRole($roles) || !$roles) {
	// 		return $next($request);
	// 	}
	// 	return response([
	// 		'error' => [
	// 				'code' => 'Insufficient Role',
	// 				'description' => 'You are not authorized to access this resource. '
	// 				]
	// 		], 401);
	// }

	// private function getRequiredRoleForRoute($route) {
	// 	$actions = $route->getAction();
	// 	return isset($actions['roles']) ? $actions['roles'] : null;
	// }

	//------------------------------------------------------------------------------

	public function handle($request, Closure $next) {
		// if($this->userHasAccessTo($request)) {
		// 	view()->share('currentUser', $request->user());

		// 	return $next($request);
		// }

		// return redirect()->route('/main');

		if getUserPriviledge('ManageUserMenuItem', UserRights.AllowWrite) <> True {
			
		}
	}

	// protected function userHasAccessTo($request) {
	// 	return $this->hasPermission($request);
	// }

	// protected function hasPermission($request) {
	// 	$required = $this->requiredPermission($request);

	// 	return !$this->forbiddenRoute($request) && $request->user()->can($required);
	// }

	// protected function requiredPermission($request) {
	// 	$action = $request->route()->getAction();

	// 	return isset($action['permission']) ? explode('|', $action['permission']) : null;
	// }

	// protected function forbiddenRoute($request) {
	// 	$action = $request->route()->getAction();

	// 	if(isset($action['except'])) {
	// 		return $action['except'] == $request->user()->role->role_slug;
	// 	}

	// 	return false;
	// }
}
 ?>
