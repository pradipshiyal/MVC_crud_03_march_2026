<?php 
	require_once "user-header.php"; 
	require_once ROOT_PATH."/app/helpers/show-message.php";
?>
	<div class="container d-flex justify-content-center align-items-center">
    	<div class="card shadow-lg p-4 add-brand">
        	<h4 class="text-center mb-4">Add Brand</h4>
        	<form action="<?= BASE_URL ?>admin/brand/add-brand" method="POST" enctype="multipart/form-data">
				<div class="row mb-3">
					<div class="col">
                		<label class="form-label">Brand Name</label>
                		<input type="text" name="brand_name" class="form-control" placeholder="Enter brand name" required>
					</div>
            	</div>
				<div class="row mb-3">
					<div class="col">
                		<label class="form-label">Brand Image</label>
                		<input type="file" name="brand_image" class="form-control" accept="image/*" required>
					</div>
            	</div>
            	<div class="row">
					<div class="col text-center">
                		<button type="submit" class="btn buttons">Add Brand</button>
					</div>
            	</div>
        	</form>
    	</div>
	</div>
<?php require "user-footer.php"; ?>