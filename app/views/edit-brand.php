<?php 
	if(isset($data) && !empty($data)){
		$record = $data['brand'];
		$isAdmin = $data['other']['isAdmin'];
	}

	require $isAdmin ? "user-header.php": "header.php";
	require_once ROOT_PATH."/app/helpers/show-message.php";
?>
	<div class="container d-flex justify-content-center align-items-center">
    	<div class="card shadow-lg p-4 add-brand">
        	<h4 class="text-center mb-4">Update Brand</h4>
        	<form action="<?= BASE_URL ?>admin/action/edit/brand/<?= $record["B_ID"] ?? ''; ?>" method="POST" enctype="multipart/form-data">
				<div class="row mb-3">
					<div class="col">
                		<label class="form-label">Brand Name</label>
                		<input type="text" name="brand_name" value="<?= $record["B_NAME"] ?? ''; ?>" class="form-control" placeholder="Enter brand name" required>
					</div>
            	</div>
				<div class="row mb-3">
					<div class="col">
                		<label class="form-label">Brand Image</label>
                		<input type="file" name="brand_image" class="form-control" accept="image/*">
					</div>
            	</div>
            	<div class="row">
					<div class="col text-center">
                		<button type="submit" class="btn buttons">Update Brand</button>
					</div>
            	</div>
        	</form>
    	</div>
	</div>
<?php require "footer.php"; ?>