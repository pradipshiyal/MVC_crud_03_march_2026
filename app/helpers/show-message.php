<?php 
	if(isset($_SESSION['popup'])) {
		echo "
			<div class='row'>
				<div class='col d-flex justify-content-center'>
					<div class='m-2 alert alert-{$_SESSION["popup"]["color"]} alert-dismissible fade show w-50 fw-bold' role='alert'>
        	 			{$_SESSION["popup"]["message"]}
        				<button type='button' class='btn-close' data-bs-dismiss='alert'></button>
    				</div>
    			</div>
    		</div>
		";
		unset($_SESSION['popup']);
	}
?>