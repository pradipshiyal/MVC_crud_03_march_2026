<?php 
	require_once "user-header.php";
    require_once ROOT_PATH."/app/helpers/show-message.php";
?>
<div class="content">
	<div class="row">
		<div class="col-md-6">
    		<div class="dashboard-card product-card d-flex justify-content-between align-items-center">
    		    <div>
    		        <div class="card-title">
    		            <i class="fa-solid fa-box me-2"></i> Total Products
    		        </div>
    		        <div class="card-number"> <?= $data['product'] ?? ""; ?></div>
    		    </div>
    		    <div class="card-icon">
    		        <i class="fa-solid fa-box-open"></i>
    		    </div>
    		</div>
		</div>
		<div class="col-md-6">
		    <div class="dashboard-card brand-card d-flex justify-content-between align-items-center">
		        <div>
		            <div class="card-title">
		                <i class="fa-solid fa-tags me-2"></i> Total Brands
		            </div>
		            <div class="card-number"> <?= $data['brand'] ?? ""; ?> </div>
		        </div>
		        <div class="card-icon">
		            <i class="fa-solid fa-tag"></i>
		        </div>
		    </div>
		</div>
	</div>
</div>
<?php require_once 'user-footer.php'; ?>		