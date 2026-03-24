<?php 
	require "user-header.php"; 
	require_once ROOT_PATH."/app/helpers/show-message.php";
?>
	<div class="container d-flex justify-content-center align-items-center">
    	<div class="card shadow-lg p-4 add-brand mt-5">
			<h4 class="text-center mb-4">Update Profile</h4>
        	<form action="<?= BASE_URL ?>admin/edit-profile" method="POST" enctype="multipart/form-data">
				<div class="row mb-3">
					<div class="col-6">
                		<label class="form-label">First name</label>
                		<input type="text" name="first_name" class="form-control" value="<?= $_SESSION['admin']['U_FIRST_NAME'] ?>" placeholder="Enter your first name" required>
					</div>
					<div class="col-6">
                		<label class="form-label">Last name</label>
                		<input type="text" name="last_name" class="form-control" value="<?= $_SESSION['admin']['U_LAST_NAME'] ?>" placeholder="Enter your last name" required>
					</div>
            	</div>
				<div class="row mb-3">
					<div class="col">
						<label class="form-label">Email </label>
                		<input type="email" name="user_email" class="form-control" value="<?= $_SESSION['admin']['U_EMAIL'] ?>" placeholder="Enter your email address" required>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col">
						<label class="form-label">Password </label>
						<div class="password-box">
                			<input type="password" name="user_password" id="password" class="form-control" placeholder="Leave blank to keep current password">
							<i class="fa-solid fa-eye toggle-password"></i>
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col">
                		<label class="form-label">Profile pic</label>
                		<input type="file" name="profile_image" class="form-control" accept="image/*">
					</div>
            	</div>
            	<div class="row">
					<div class="col text-center">
                		<button type="submit" class="btn buttons">Update Profile</button>
					</div>
            	</div>
        	</form>
    	</div>
	</div>
<?php require "user-footer.php"; ?>