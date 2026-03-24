<?php 
	require "header.php"; 
	require_once ROOT_PATH."/app/helpers/show-message.php";	
?>
<div class="container d-flex justify-content-center align-items-center">
    <div class="card shadow-lg p-4 add-brand">
    	<h4 class="text-center mb-4">Login</h4>
    	<form action="<?= BASE_URL ?>admin/login" method="POST">
			<div class="row mb-3">
				<div class="col">
            		<label class="form-label">Email address</label>
            		<input type="text" name="admin_email" value="pradip@gmail.com" class="form-control" placeholder="Enter email address" required>
				</div>
        	</div>
			<div class="row mb-3">
				<div class="col">
            		<label class="form-label">Password</label>
					<div class="password-box">
            			<input type="password" name="admin_password" value="Ph@ntom" id="password" class="form-control" placeholder="Enter password" required>
						<i class="fa-solid fa-eye toggle-password"></i>
					</div>
				</div>
        	</div>
        	<div class="row">
				<div class="col text-center">
            		<button type="submit" class="btn buttons">Login</button>
				</div>
        	</div>
    	</form>
    </div>
</div>

<?php require "footer.php"; ?>