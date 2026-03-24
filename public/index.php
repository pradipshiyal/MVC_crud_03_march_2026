<?php 
	session_start();
	define('ROOT_PATH', dirname(__DIR__));
	define("BASE_URL", "http://localhost:8000/");

	require_once ROOT_PATH."/app/core/Controller.php";
	require_once ROOT_PATH."/app/core/Model.php";
	require_once ROOT_PATH."/app/core/Router.php";
	require_once ROOT_PATH."/app/core/Routes.php";
?>