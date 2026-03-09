<?php 
	require_once ROOT_PATH."/app/models/Product.php";

	class ProductController extends Controller{
		public function index(){
			$product = $this->model("Product");
			$products = $product->allProducts();
			$this->view("list-of-products", $products);
		}

		public function create(){
			$brand = $this->model("Brand");
			$brands = $brand->brandNames();
			
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$product = $this->model("Product");
				
				$result = $product->insert([
					"P_NAME"=> $_POST['product_name'],
					"P_PRICE"=> $_POST['product_price'],
					"P_STATUS"=> $_POST['product_status'],
					"P_BRAND"=> $_POST['product_brand'],
					"P_IMAGE" => $this->uploadFile("product_image"),
					"P_DESC" => $_POST['product_desc'],
					"CREATED_AT"=> date("d M Y"),
				]);

				$result && $this->showMessage(["The product has been added successfully."]);
				$this->redirect("product/create");
			}
			$this->view("add-product", $brands);
		}

		public function edit($data){
			$product = $this->model("Product");
			$brand = $this->model("Brand");
			$record = $product->getOne(["P_ID"=> $data[0]]);
			
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$img = $this->uploadFile('product_image');
				(!is_null($img)) ? $this->removeFile($record["P_IMAGE"]) : $img = $record["P_IMAGE"];

				$result = $product->update([
					"P_NAME"=> $_POST['product_name'],
					"P_PRICE"=> $_POST['product_price'],
					"P_STATUS"=> $_POST['product_status'],
					"P_BRAND"=> $_POST['product_brand'],
					"P_IMAGE" => $img,
					"P_DESC" => $_POST['product_desc'],
				],["P_ID" => $data[0]]);

				if($result){
					$this->showMessage(["The product has been updated successfully."]);
					$this->redirect("product/index");
				}
			}else{
				$this->view("edit-product", [
					"brandNames" => $brand->brandNames(),
					"productInfo" => $record
				]);
			}
		}

		public function destroy($data){
			$product = $this->model("Product");
			$record = $product->getOne(["P_ID"=> $data[0]]);
			$product->delete(["P_ID"=>$data[0]]);
			
			$this->removeFile($record["P_IMAGE"]);
			$this->showMessage(["The product has been deleted successfully."]);
			$this->redirect("product/index");
		}
	}
?>