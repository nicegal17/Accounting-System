<?php namespace App\Http\Middleware;

use Closure; 
use Illuminate\Contracts\Routing\Middleware;

 //class RoleMiddleware {
// 	public function handle($request, Closure $next) {
// 		$roles = $this->getRequiredRoleForRoute($request->route());

// 		// if($request->user()->hasRole($roles) || !$roles) {
// 		if($request->auth()->hasRole($roles) || !$roles) {
// 			return $next($request);
// 		}
// 		return response([
// 			'error' => [
// 					'code' => 'Insufficient Role',
// 					'description' => 'You are not authorized to access this resource.'
// 					]
// 			], 401);
// 	}

// 	private function getRequiredRoleForRoute($route) {
// 		$actions = $route->getAction();
// 		return isset($actions['roles']) ? $actions['roles'] : null;
// 	}
// }

class PermissionsRequiredMiddleware implements Middleware {

	public function handle($request, Closure $next) {
		if (!$user = $request->user()) {
			return $next($request);
		}

		$route = $request->route();

		$actions = $route->getAction();

		if (!$permissions = isset($action['permission_title']) ? $actions['permission_title'] : null){
			return $next($request);
		}

		$userPermissions = array_fetch($user->permissions()->whereIn('slug', (array) $permissions)->get()->toArray(), 'slug');

		$permissions = (array) $permissions;

		if (isset($actions['permissions_require_all'])) {
			// If user has EVERY permission required.
        	if (count($permissions) == count($userPermissions)){    
            	// Access is granted.
           	 	return $next($request);
        	}
		} else {
			 // If the user has the permission.
        if (count($userPermissions) >= 1) {
            // Access is granted and the rest of the permissions are ignored.
            return $next($request);
        	}
		}

		return abort(401);
	}

}
 ?>