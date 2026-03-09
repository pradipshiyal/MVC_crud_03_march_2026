<?php
	class Database{
		private $host = "localhost", 
		$db_name = "mvc_crud", 
		$username = "root", 
		$password = "Ph@ntom";
		public $conn;

		public function connect(){
			$this->conn = null;
			try{
				$this->conn = new PDO(
					"mysql:host=". $this->host ."; dbname=". $this->db_name, 
					$this->username, 
					$this->password);
			}catch(PDOException $e){
				echo "Connection Error: ". $e->getMessage();
			}

			return $this->conn;
		}
	}
?>