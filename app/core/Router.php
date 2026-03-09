<?php 
	class Router{
		public function route(){
			$url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
			$url = $url ?: "product/index";
			$url = explode("/", $url);
			
			$controller_name = ucfirst($url[0]). "Controller";
			$method = $url[1] ?? "index";
			$parameters = array_slice($url, 2);
			
			require_once ROOT_PATH."/app/controllers/$controller_name.php";
			
			$controller = new $controller_name();
			$controller->$method($parameters ?? []);
		}
	}
?>