<?php 
	require_once ROOT_PATH.'/app/core/Database.php';
	
	class Model{
		protected $conn, $table;
		
		public function __construct(){
			$database = new Database();
			$this->conn = $database->connect();
		}

		public function getOne($data){
			$column = array_keys($data)[0];
    		$value = array_values($data)[0];
			
			$result = $this->conn->prepare("SELECT * FROM {$this->table} WHERE $column = ?");
    		
			$result->execute([$value]);
			return $result->fetch(PDO::FETCH_ASSOC);	
		}

		public function getAll(){
			$result = $this->conn->prepare('SELECT * FROM '. $this->table);
			$result->execute();
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}

		public function insert($data){
			$columns = array_keys($data);
    		$values  = array_values($data);

			$columnString = implode(',', $columns);
    		$placeholderString = implode(',', array_fill(0, count($columns), '?'));

			$result = $this->conn->prepare("INSERT INTO {$this->table} ($columnString) VALUES ($placeholderString)");
			return $result->execute($values);
		}

		public function update($data, $where){
			$columns = array_keys($data);
			$values = array_values($data);

			$setString = implode('=?, ', $columns).'=?';
			$whereCol = array_keys($where)[0];
			$whereVal = array_values($where)[0];

			$result = $this->conn->prepare("UPDATE {$this->table} SET $setString WHERE $whereCol = ?");
			echo "<pre>"; print_r($result);
			return $result->execute(array_merge($values, [$whereVal]));
		}

		public function delete($data){
			$column = array_keys($data)[0];
			$value = array_values($data)[0];

			$result = $this->conn->prepare("DELETE FROM {$this->table} WHERE $column = ?");
			return $result->execute([$value]);
		}

		public function getTotal(){
			$result = $this->conn->prepare("SELECT COUNT(*) FROM {$this->table}");
			$result->execute();
			return $result->fetchColumn();
		}
	}
?>