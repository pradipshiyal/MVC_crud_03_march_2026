<?php 
	class BrandController extends Controller{
		public function index($data){
			$brand = $this->model('Brand');
			$data = ['brands' => $brand->getAll(), 'other'=> $data];
			$this->view('list-of-brands', $data);
		}

		public function create($data){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$brand = $this->model('Brand');
				
				$result = $brand->insert([
					'B_NAME'=> $_POST['brand_name'], 
					'B_IMAGE' => $this->uploadFile('brand_image')
				]);
				
				$result && $this->showMessage(['The brand has been added successfully.']);
				$this->redirect('admin/brand/add-brand');
			}
			$this->view('add-brand');
		}

		public function edit($data){
			$brand = $this->model('Brand');
			$record = $brand->getOne(['B_ID'=> $data['args']]);
			
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$img = $this->uploadFile('brand_image');
				
				(!is_null($img)) ? $this->removeFile($record['B_IMAGE']) : $img = $record['B_IMAGE'];
				
				$result = $brand->update([
					'B_NAME'=> $_POST['brand_name'],
					'B_IMAGE' => $img
				],['B_ID' => $data['args']]);

				if($result){
					$this->showMessage(['The brand has been updated successfully.']);
					$this->redirect('admin/brand/manage-brand');
				}
			}
			$this->view('edit-brand', ['brand'=> $record, 'other'=> $data]);
		}

		public function destroy($data){
			$product = $this->model('Product');
			$brand = $this->model('Brand');
			
			$result = $product->brandExist(['P_BRAND'=> $data['args']]);
			
			if($result){
				$this->showMessage(['Brand cannot be deleted. It is linked to existing products.', 'danger']);
			}else{
				$record = $brand->getOne(['B_ID'=> $data['args']]);
				$result = $brand->delete(['B_ID'=> $data['args']]);
				$file = $this->removeFile($record['B_IMAGE']);
				($result && $file) && $this->showMessage(['The brand has been removed successfully.']);
			}
			$this->redirect('admin/brand/manage-brand');
		}
	}
?>

