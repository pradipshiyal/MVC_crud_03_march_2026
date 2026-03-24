<?php 
	class AdminController extends Controller{
		public function index($data){
			$this->view('show-profile');
		}
		
		public function create($data){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$user = $this->model('User');
				$img = $this->uploadFile('profile_image');

				(!is_null($img)) ? $this->removeFile($_SESSION['admin']['U_PROFILE']) : $img = $_SESSION['admin']['U_PROFILE'];
				$password = (!empty($_POST['user_password']))
            				? password_hash($_POST['user_password'], PASSWORD_DEFAULT)
            				: $_SESSION['admin']['U_PASSWORD'];

				$data = [
					'U_FIRST_NAME' => $_POST['first_name'],
					'U_LAST_NAME' => $_POST['last_name'],
					'U_EMAIL' => $_POST['user_email'],
					'U_PASSWORD' => $password,
					'U_PROFILE' => $img,
				];

				$result = $user->update($data, ['U_ID' => $_SESSION['admin']['U_ID']]);

				if($result){
					$_SESSION['admin'] =array_merge($_SESSION['admin'], $data);
					$this->showMessage(['Your profile has been updated.']);
					$this->redirect('admin/show-profile');
				}
			}
		
			$this->view('edit-profile');
		}

		public function edit($data){

		}
		public function destroy($data){
			
		}
	}
?>