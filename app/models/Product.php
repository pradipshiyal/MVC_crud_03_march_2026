<?php 
	class Product extends Model{
		protected $table = "Product";

		public function allProducts(){
			$result = $this->conn->prepare("
				SELECT P.P_ID, P.P_NAME, P.P_PRICE, P.P_STATUS, P.P_IMAGE, P.P_BRAND, P.P_DESC, P.CREATED_AT,
    			B.B_NAME
				FROM PRODUCT P
				INNER JOIN BRAND B 
				ON P.P_BRAND = B.B_ID;
			");
			$result->execute();
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}

		public function brandExist($data){
			$column = array_keys($data)[0];
			$value = array_values($data)[0];

			$result = $this->conn->prepare("SELECT COUNT(*) FROM {$this->table} WHERE $column = ?");
			$result->execute([$value]);

			return $result->fetchColumn() > 0;
		}
	}
?>