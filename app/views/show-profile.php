<?php 
	require "user-header.php"; 
	require_once ROOT_PATH."/app/helpers/show-message.php";
?>
	<div class="container d-flex justify-content-center align-items-center">
    	<div class="card shadow-lg p-4 add-brand">
			<div class="row">
				<div class="col text-center">
					<img src="<?= BASE_URL ?>uploads/<?= $_SESSION['admin']['U_PROFILE'] ?>" alt="" class="img-fluid w-25 profile-pic">
				</div>
			</div>
			<div class="row mt-3">
				<div class="col text-center h5"> <?= $_SESSION['admin']['U_FIRST_NAME'] ?> <?= $_SESSION['admin']['U_LAST_NAME']?></div>
			</div>
			<div class="row">
				<div class="col text-center text-muted"> <?= $_SESSION['admin']['U_EMAIL'] ?> </div>
			</div>
			<div class="row">
				<div class="col text-center text-muted mt-3"> 
					<a href="<?= BASE_URL ?>admin/edit-profile" class="btn buttons"> Edit Profile </a>
				</div>
			</div>
    	</div>
	</div>
<?php require "user-footer.php"; ?>