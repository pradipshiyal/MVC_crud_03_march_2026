<?php
	class Router extends Controller{
    	private $routes = [];
		private $currentRoute = null;

		public function route($url, $data){
			[$controller, $method] = $data;
		
			$this->routes[$url] = [
				'controller' => $controller,
				'method' => $method,
				'middleware' => null
			];
			$this->currentRoute = $url;
			return $this;
    	}

		public function middleware($name){
			if($this->currentRoute){
				$this->routes[$this->currentRoute]['middleware'] = $name;
				$this->currentRoute = null;
			}
			return $this;
		}

    	public function run(){
			$url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
			$isAdminRoute = $url[0] === 'admin' ? 1 : 0;
			$id = (isset($url[1]) && $url[1] === 'action') ? array_pop($url) : 0;
			$url = implode('/', $url);

			if(!isset($this->routes[$url])){
            	return $this->view('page-not-found', 'route not found');
        	}
			
			$route = $this->routes[$url];
			$controllerName = $route['controller'];
			$method = $route['method'];
			
			if($route['middleware'] === 'admin'){
            	if(!isset($_SESSION['admin'])){
                	$this->showMessage(['Unauthorized Access. You must login to continue.', 'danger']);
                	$this->redirect('admin/login');
					exit;
            	}
        	}

			$controllerFile = ROOT_PATH."/app/controllers/$controllerName.php";
			
    	    if(!file_exists($controllerFile)){
    	    	return $this->view('page-not-found', 'Controller not found');
    	    }

    	    require_once $controllerFile;
    	    $controller = new $controllerName();
    	    if(!method_exists($controller, $method)){
    	        return $this->view('page-not-found', 'method not found');
    	    }
    	    $controller->$method(['isAdmin' => $isAdminRoute, 'args' => $id]);
    	}

		public function temp(){
			echo '<pre>';
			print_r($this->routes);
		}
	}
?>