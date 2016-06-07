<?php namespace App\Libs\Navigation;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;

class Builder {
	
	private $menuItems = [];
	private $routes = NULL;
	private $user = NULL;

	public function __construct(Arr $arr, Request $request, Router $router) {
		$this->arr = $arr;
		$this->request = $request;
		$this->user = $request->user();
		$this->router = $router;
		$this->routes = $router->getRoutes();
	}

	public function build() {
		foreach ($this->routes->getIterator() as $it) {
			$action = $it->getAction();

			if(!$this->forbidden($action) && $item = $this->arr->get($action, 'menuItem')) {
				$routeName = $this->arr->get($action, 'as');

				$this->menuItems[$routeName] = array('icon' => @$item['icon'], 'title' => @$item['title']);
			}
		}

		return $this;
	}

	protected function forbidden($action) {
		if(isset($action['except'])) {
			return $action['except'] == $this->user->roles->fetch('role_slug');
		}

		return false;
	}

	public function render($itemView = 'admin.templates.main') {
		$listElements = [];

		foreach ($this->menuItems as $routeName => $itemArray) {
			$listElements[] = $this->getListItem($routeName, $itemArray);
		}

		return join($listElements, '');
	}

	protected function getListItem($routeName, $itemArray) {
		$action = $this->routes->getByName($routeName)->getAction();

		$permission = $this->arr->get($action, 'permission');

		if((!empty($permission) && $this->user->canSeeMenuItem($permission)) || empty($permission)) {
			$except = $this->arr->get($action, 'except');

			if((!isset($except) || (isset($except) && !count($except))) || (isset($except) && !$this->user->is($except))) {
				$data = [
					'link' => route($routeName),
					'active' => $this->isActive($routeName),
					'title' => $this->getTitle($itemArray['title']),
					'icon' => $itemArray['icon'],
					'id' => str_replace(' ', '-', strtolower($itemArray['title']))
				];

				return view('admin.templates.main', $data);
			}
		}

	}

	protected function isActive($routeName) {
		return $this->router->getCurrentRoute()->getName() == $routeName ? 'active' : NULL;
	}
}
?>