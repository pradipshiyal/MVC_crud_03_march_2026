<?php 
	class BrandController extends Controller{
		public function index(){
			$brand = $this->model("Brand");
			$brands = $brand->getAll();
			$this->view("list-of-brands", $brands);
		}

		public function create(){
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$brand = $this->model("Brand");
				
				$result = $brand->insert([
					"B_NAME"=> $_POST['brand_name'], 
					"B_IMAGE" => $this->uploadFile('brand_image')
				]);
				
				$result && $this->showMessage(["The brand has been added successfully."]);
				$this->redirect("brand/create");
			}
			$this->view("add-brand");
		}

		public function edit($data){
			$brand = $this->model("Brand");
			$record = $brand->getOne(["B_ID"=> $data[0]]);
			
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$img = $this->uploadFile('brand_image');
				
				(!is_null($img)) ? $this->removeFile($record["B_IMAGE"]) : $img = $record["B_IMAGE"];
				
				$result = $brand->update([
					"B_NAME"=> $_POST['brand_name'], 
					"B_IMAGE" => $img
				],["B_ID" => $data[0]]);

				if($result){
					$this->showMessage(["The brand has been updated successfully."]);
					$this->redirect("brand/index");
				}
			}else{
				$this->view("edit-brand", $record);
			}
		}

		public function destroy($data){
			$product = $this->model("Product");
			$brand = $this->model("Brand");
			
			$result = $product->brandExist(["P_BRAND"=> $data[0]]);
			
			if($result){
				$this->showMessage(["Brand cannot be deleted. It is linked to existing products.", "danger"]);
			}else{
				$record = $brand->getOne(["B_ID"=> $data[0]]);
				$result = $brand->delete(["B_ID"=> $data[0]]);
				$file = $this->removeFile($record["B_IMAGE"]);
				($result && $file) && $this->showMessage(["The brand has been removed successfully."]);
			}
			$this->redirect("brand/index");
		}
	}
?>

