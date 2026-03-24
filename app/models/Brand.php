<?php 
	class Brand extends Model{
		protected $table = 'brand';

		public function brandNames(){
			$result = $this->conn->prepare('SELECT B_ID, B_NAME FROM '. $this->table);
			$result->execute();
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
	}
?>