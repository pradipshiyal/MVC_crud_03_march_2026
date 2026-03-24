<?php 
	class Product extends Model{
		protected $table = 'Product';

		public function allProducts($active = true, $brand = null, $price = null){
			$query = '
				SELECT P.P_ID, P.P_NAME, P.P_PRICE, P.P_STATUS, P.P_IMAGE, P.P_BRAND, P.P_DESC, P.CREATED_AT,
    			B.B_NAME
				FROM PRODUCT P
				INNER JOIN BRAND B 
				ON P.P_BRAND = B.B_ID';
			
			$conditions = [];
    		$params = [];
			
			if(!$active){
				$conditions[] = "P.P_STATUS = 1";
			}

			if(!empty($brand)){
        		$conditions[] = "P.P_BRAND = :brand";
        		$params[':brand'] = $brand;
    		}

			if(!empty($price)){
        		list($min, $max) = explode('-', $price);

        		if($min == $max){
    				$conditions[] = "P.P_PRICE >= :min";
    				$params[':min'] = $min;
				} else {
				    $conditions[] = "P.P_PRICE BETWEEN :min AND :max";
				    $params[':min'] = $min;
				    $params[':max'] = $max;
				}
    		}

			if(!empty($conditions)){
        		$query .= " WHERE " . implode(" AND ", $conditions);
    		}
			
			$result = $this->conn->prepare($query);
			$result->execute($params);
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