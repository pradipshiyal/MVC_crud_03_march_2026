<?php 
	if(isset($data) && !empty($data)){
		$isAdmin = $data['other']['isAdmin'];
	}

	require $isAdmin ? "user-header.php": "header.php"; 
	require_once ROOT_PATH."/app/helpers/show-message.php";	
?>
	<div class="container d-flex justify-content-center align-items-center">
    	<div class="card shadow-lg p-4 add-product w-75">
        	<h4 class="text-center mb-4">Update Product</h4>
        	<form action="<?= BASE_URL ?>admin/action/edit/product/<?= $data["productInfo"]["P_ID"] ?? ""?>" method="POST" enctype="multipart/form-data">
				<div class="row mb-3">
					<div class="col-6">
                		<label class="form-label">Product Name</label>
                		<input type="text" name="product_name" class="form-control" value="<?= $data["productInfo"]["P_NAME"] ?? ""; ?>" placeholder="Enter product name" required>
					</div>
					<div class="col-6">
						<label class="form-label">Product Brand</label>
						<select name="product_brand" id="" class="form-select" required>
							<option value="" selected disabled> Select brand</option>
							<?php  
								foreach($data["brandNames"] ?? "" as $row){
									echo("<option value='{$row['B_ID']}' ".($row['B_ID'] == ($data["productInfo"]["P_BRAND"] ?? "") ? "selected" : "")." > {$row['B_NAME']}</option>");
								}
							?>
						</select>
					</div>
            	</div>
				<div class="row mb-3">
					<div class="col-6">
						<label class="form-label">Product Image</label>
                		<input type="file" name="product_image" class="form-control" accept="image/*"/>
					</div>
					<div class="col-6">
						<div class="row">
							<div class="col-7">
								<label class="form-label">Price</label>
								<div class="input-group">
									<span class="input-group-text">₹</span>
									<input type="number" name="product_price" id="" class="form-control" value="<?= $data["productInfo"]["P_PRICE"] ?? ""; ?>" placeholder="Ex.100" required>
								</div>
							</div>
							<div class="col-5">
								<label class="form-label">Status</label>
								<select name="product_status" id="" class="form-select" required>
									<option value="1" <?= isset($data["productInfo"]["P_STATUS"]) && $data["productInfo"]["P_STATUS"] == 1 ? "selected" : "" ?>> Activate </option>
									<option value="0" <?= isset($data["productInfo"]["P_STATUS"]) && $data["productInfo"]["P_STATUS"] == 0 ? "selected" : "" ?>> Inactive </option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col">
                		<label class="form-label">Product Description</label>
                		<textarea name="product_desc" id="" cols="" rows="3" class="form-control" placeholder="Enter product description" required><?= $data["productInfo"]["P_DESC"] ?? ""; ?></textarea>
					</div>
            	</div>
            	<div class="row">
					<div class="col text-center">
                		<button type="submit" class="btn buttons">Update Product</button>
					</div>
            	</div>
        	</form>
    	</div>
	</div>
<?php require "footer.php"; ?>