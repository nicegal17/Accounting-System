<?php namespace App;

trait UserACL {

  //checks permission
  public function can($perm = null) {
    if($perm) {
      return $this->checkPermission($this->getArray($perm)); 
    }

    return false;
  }

  protected function getArray($perm) {
    return is_array($perm) ? $perm : explode('|', $perm);
  }

  protected function checkPermission(Array $permArray = []) {
    $perms = $this->role->permissions->fetch('permission_slug');

    $perms = array_map('strtolower', $perms->toArray());

    return count(array_intersect($perms, $permArray));
  }

  public function hasPermission($perm = null) {
    return $this->can($perm);
  }

  public function hasRole($role = null) {
    if(is_null($role)) return false;

    return strtolower($this->role->role_slug) == strtolower($role);
  }

  public function is($role) {
     return $this->role->role_slug == $role;
  }

  public function hasRoute($routeName) {
     $route = app('router')->getRoutes()->getByName($routeName);

     if($route) {

        $action = $route->getAction();

        if(isset($action['permission'])) {
            $array = explode('|', $action['permission']);
            return $this->checkPermission($array);
        }
     }

     return false;
  }

  public function canSeeMenuItem($perm) {
    return $this->can($perm) || $this->hasAnylike($perm);
  }

  protected function hasAnylike($perm) {
    $parts = explode('_', $perm);

    $requiredPerm = array_pop($parts);

    $perms = $this->role->permissions->fetch('permission_slug');

    foreach ($perms as $perm) {
      if(ends_with($perm, $requiredPerm)) return true;
    }
    return false;
  }
}

?>