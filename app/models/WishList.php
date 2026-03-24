<?php
    class WishList extends Model{
        protected $table = 'Product';

        public function wishList(){
            $result = $this->conn->prepare('
				SELECT P.P_ID, P.P_NAME, P.P_PRICE, P.P_STATUS, P.P_IMAGE, P.P_BRAND, P.P_DESC, P.CREATED_AT,
    			B.B_NAME
				FROM PRODUCT P
				INNER JOIN BRAND B 
				ON P.P_BRAND = B.B_ID
                WHERE P.P_STATUS = 1');
			
            $result->execute();
			return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>