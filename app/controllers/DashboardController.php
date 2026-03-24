<?php 
	class DashboardController extends Controller{
		public function index($data){
			$product = $this->model('Product');
			$brand = $this->model('Brand');

			$this->view('admin-dashboard', [
				'product'=> $product->getTotal(),
				'brand'=> $brand->getTotal()
			]);
		}
		
		public function create($data){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$user = $this->model('User');
				$data = $user->getUser($_POST['admin_email']);
				
				if($data && password_verify($_POST['admin_password'], $data['U_PASSWORD'])){
					$_SESSION['admin'] = $data;
					$this->redirect('admin/dashboard');
				}else{
					$this->showMessage(['Invalid email or password.', 'danger']);
					$this->redirect('admin/login');
				}
			}
			$this->view('admin-login');
		}

		public function edit($data){

		}
		
		public function destroy($data){
			unset($_SESSION['admin']);
			$this->redirect('');
		}
	}
?>