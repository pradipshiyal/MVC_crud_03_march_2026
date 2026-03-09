<?php 
	require "header.php"; 
	require_once ROOT_PATH."/app/helpers/show-message.php";	
?>
	<div class="container d-flex justify-content-center align-items-center">
    	<div class="card shadow-lg p-4 add-product w-75">
        	<h4 class="text-center mb-4">Add Product</h4>
        	<form action="<?= BASE_URL ?>product/create" method="POST" enctype="multipart/form-data">
				<div class="row mb-3">
					<div class="col-6">
                		<label class="form-label">Product Name</label>
                		<input type="text" name="product_name" class="form-control" placeholder="Enter product name" required>
					</div>
					<div class="col-6">
						<label class="form-label">Product Brand</label>
						<select name="product_brand" id="" class="form-select" required>
							<option value="" selected disabled> Select brand</option>
							<?php  
								if(isset($data) && !empty($data)):
									foreach($data as $row):
										echo("<option value='{$row['B_ID']}'> {$row['B_NAME']}</option>");
									endforeach;
								endif;
							?>
						</select>
					</div>
            	</div>
				<div class="row mb-3">
					<div class="col-6">
						<label class="form-label">Product Image</label>
                		<input type="file" name="product_image" class="form-control" accept="image/*" required>
					</div>
					<div class="col-6">
						<div class="row">
							<div class="col-7">
								<label class="form-label">Price</label>
								<div class="input-group">
									<span class="input-group-text">₹</span>
									<input type="number" name="product_price" id="" class="form-control" placeholder="Ex.100" required>
								</div>
							</div>
							<div class="col-5">
								<label class="form-label">Status</label>
								<select name="product_status" id="" class="form-select" required>
									<option value="1"> Activate </option>
									<option value="0"> Inactive </option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col">
                		<label class="form-label">Product Description</label>
                		<textarea name="product_desc" id="" cols="" rows="3" class="form-control" placeholder="Enter product description" required></textarea>
					</div>
            	</div>
            	<div class="row">
					<div class="col text-center">
                		<button type="submit" class="btn buttons">Add Product</button>
					</div>
            	</div>
        	</form>
    	</div>
	</div>
<?php require "footer.php"; ?>