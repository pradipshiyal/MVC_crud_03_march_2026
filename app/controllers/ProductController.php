<?php 
	class ProductController extends Controller{
		public function index($data){
    		$brand_name = $_GET['brand_filter'] ?? null;
    		$price = $_GET['price_filter'] ?? null;
			$data['wishlist'] = $_GET['wishlist'] ?? [];
			
			$product = $this->model('Product');
    		$brand = $this->model('Brand');
			
    		$products = $product->allProducts(
    		    filter_var($data['args'], FILTER_VALIDATE_BOOLEAN), 
    		    $brand_name, 
    		    $price
    		);
			
    		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    		    $this->view('product-template', [
					'products' => $products,
					'other'=> $data
				]);
    		} else {
    		    $this->view('list-of-products', [
    		        'brands' => $brand->brandNames(),
    		        'other'=> $data
    		    ]);
    		}
		}

		public function create($data){
			$brand = $this->model('Brand');
			$brands = $brand->brandNames();
			
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$product = $this->model('Product');
				
				$result = $product->insert([
					'P_NAME' => $_POST['product_name'],
					'P_PRICE' => $_POST['product_price'],
					'P_STATUS' => $_POST['product_status'],
					'P_BRAND' => $_POST['product_brand'],
					'P_IMAGE' => $this->uploadFile('product_image'),
					'P_DESC' => $_POST['product_desc'],
					'CREATED_AT' => date('d M Y'),
				]);

				$result && $this->showMessage(['The product has been added successfully.']);
				$this->redirect('admin/product/add-product');
			}
			$this->view('add-product', $brands);
		}

		public function edit($data){
			$product = $this->model('Product');
			$brand = $this->model('Brand');
			$record = $product->getOne(['P_ID'=> $data['args']]);
			
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$img = $this->uploadFile('product_image');
				(!is_null($img)) ? $this->removeFile($record['P_IMAGE']) : $img = $record['P_IMAGE'];

				$result = $product->update([
					'P_NAME'=> $_POST['product_name'],
					'P_PRICE'=> $_POST['product_price'],
					'P_STATUS'=> $_POST['product_status'],
					'P_BRAND'=> $_POST['product_brand'],
					'P_IMAGE' => $img,
					'P_DESC' => $_POST['product_desc'],
				],['P_ID' => $data['args']]);

				if($result){
					$this->showMessage(['The product has been updated successfully.']);
					$this->redirect('admin/product/manage-product');
				}
			}else{
				$this->view('edit-product', [
					'brandNames' => $brand->brandNames(),
					'productInfo' => $record,
					'other' => $data
				]);
			}
		}

		public function destroy($data){
			$product = $this->model('Product');
			$record = $product->getOne(['P_ID'=> $data['args']]);
			$product->delete(['P_ID'=>$data['args']]);
			
			$this->removeFile($record['P_IMAGE']);
			$this->showMessage(['The product has been deleted successfully.']);
			$this->redirect('admin/product/manage-product');
		}
	}
?>