<?php
    class WishlistController extends Controller{
        public function index($data){
            $data['wishlist'] = $_GET['wishlist'] ?? [];

            $wishList = $this->model('WishList');
    		$products = $wishList->wishList();

            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                $this->view('wishlist-template', [
					'products' => $products,
					'other'=> $data
				]);
    		} else {
    		    $this->view('list-of-wishlist', [
                    'other'=> $data,
    		    ]);
    		}
        }
    }
?>