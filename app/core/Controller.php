<?php 
	class Controller{
		public function model($model){
			require_once ROOT_PATH."/app/models/". $model . ".php";
			return new $model;
		}

		public function view($view, $data = []){
			require_once ROOT_PATH."/app/views/". $view . ".php";
		}

		public function redirect($path){
			header("Location: ". BASE_URL .$path);
    		exit;
		}

		public function showMessage($data){
			$_SESSION["popup"] = [
				"message"=> $data[0],
				"color" => $data[1] ?? "success"
			];
		}

		public function uploadFile($fileName){
			if(empty($_FILES[$fileName]['name'])) return null;
		
			$uploadPath = ROOT_PATH."/public/uploads/";
			$tmp = $_FILES[$fileName]['tmp_name'];
				
			do{
				$image = rand(10000, 99999).".png";
			}while(file_exists($uploadPath.$image));

			move_uploaded_file($tmp, $uploadPath.$image);
			return $image;
		}

		public function removeFile($fileName){
			return unlink(ROOT_PATH."/public/uploads/{$fileName}");
		}
	}
?>