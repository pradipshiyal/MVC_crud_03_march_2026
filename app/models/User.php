<?php 
	class User extends Model{
		protected $table = "users";

		public function getUser($email){
			$result = $this->conn->prepare("SELECT * FROM {$this->table} WHERE U_EMAIL = ?");
			$result->execute([$email]);
			return $result->fetch(PDO::FETCH_ASSOC);
		}
	}
?>